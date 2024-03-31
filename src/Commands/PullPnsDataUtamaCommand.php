<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Kanekescom\Siasn\Simpeg\Http\Client\Pns;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Models\PnsDataUtama;

class PullPnsDataUtamaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-pns-data-utama
                            {--nipBaru= : nipBaru. Can be separated by commas.}
                            {--skip=0: skip value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull PNS data utama pegawai to database from endpoint on SIASN Simpeg API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $nipBaru = $this->option('nipBaru') ? explode(',', $this->option('nipBaru')) : [];
        $skip = (int) $this->option('skip');
        $iPegawai = $skip;
        $pegawais = filled($nipBaru) ? Pegawai::whereIn('nip_baru', $nipBaru)->get() : Pegawai::get();
        $pegawaiCount = $pegawais->count();

        if ($skip >= $pegawaiCount) {
            $this->components->error('Skip option value exceeds number of pegawai.');

            return self::FAILURE;
        }

        $pegawais = $pegawais->skip($skip);
        $pegawais->each(function ($pegawai) use ($pegawaiCount, &$iPegawai, $start, $skip) {
            $iPegawai++;

            $this->info("PEGAWAI: [{$iPegawai}/{$pegawaiCount}] {$pegawai->nip_baru}");

            try {
                $response = Pns::getDataUtama($pegawai->nip_baru);
            } catch (\Exception $e) {
                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }

            try {
                $model = new PnsDataUtama;

                DB::transaction(function () use ($model, $response, $pegawai) {
                    $model->updateOrCreate($response->toArray());
                    $model->withTrashed()
                        ->where('id', $pegawai->nip_baru)
                        ->restore();
                });
            } catch (\Exception $e) {
                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }

            $executedItems = Number::format($iPegawai - $skip);

            $this->info(str("The task has run so far for {$start->shortAbsoluteDiffForHumans(now(), 1)} and {$executedItems} items have been executed")->upper());
            $this->newLine();
        });

        return self::SUCCESS;
    }
}
