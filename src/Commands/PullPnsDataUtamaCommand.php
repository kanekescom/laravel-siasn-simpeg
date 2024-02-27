<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Models\PnsDataUtama;
use Kanekescom\Siasn\Simpeg\Models\PullTracking;
use Kanekescom\Siasn\Simpeg\Models\PullTrackingError;
use Kanekescom\Siasn\Simpeg\Services\PullTrackingErrorService;

class PullPnsDataUtamaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-pns-data-utama
                            {--nipBaru= : NIP Baru}
                            {--skip=0}
                            {--track}
                            {--startOver}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull pns data utama pegawai to database from endpoint on SIASN Simpeg API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nipBaru = $this->option('nipBaru');
        $track = $this->option('track');
        $startOver = $this->option('startOver');
        $skip = $startOver ? 0 : $this->option('skip');

        $pullTrackingCommandName = 'siasn-simpeg:pull-pns-data-utama';
        $hasPullTracking = $nipBaru ? null : PullTracking::where('command', $pullTrackingCommandName)->first();
        $lastTryPullTracking = $startOver ? 0 : $hasPullTracking?->last_try;
        $skip = (int) ($skip > $lastTryPullTracking ? $skip : $lastTryPullTracking);
        $iPegawai = $skip;

        if ($startOver && $hasPullTracking) {
            $hasPullTracking->delete();
            $hasPullTracking = null;
            $skip = 0;

            $this->info(str('Start over command.')->upper());
            $this->newLine();
        }

        $startPegawai = now();
        $pullTracking = new PullTracking;
        $pullTrackingError = new PullTrackingError;
        $pegawais = Pegawai::get();

        if ($nipBaru) {
            $pegawais = Pegawai::where('nip_baru', $nipBaru)->get();
        }

        $pegawaiCount = $pegawais->count();

        if ($skip >= $pegawaiCount) {
            $this->components->error('Skip option value exceeds number of pegawai.');

            return self::FAILURE;
        }

        if ($nipBaru == null && $track) {
            $pullTracking = PullTracking::updateOrCreate(['command' => $pullTrackingCommandName], [
                'start_from' => $skip,
                'amount' => $pegawaiCount,
            ]);
        }

        if ($nipBaru == null && $track && ! $startOver && $hasPullTracking && $hasPullTracking->done_at) {
            $this->info('Pull command has been completed. Use --startOver to re-pull from the beginning.');

            return self::SUCCESS;
        }

        if ($nipBaru == null && $track && ! $startOver && $hasPullTracking) {
            $pullingStartingForm = $skip + 1;

            $this->info(str("Continue pulling starting from {$pullingStartingForm}")->upper());
            $this->newLine();
        }

        $pegawais = $pegawais->skip($skip);
        $pegawais->each(function ($pegawai) use ($pegawaiCount, &$iPegawai, $startPegawai, $pullTracking, $pullTrackingError, $skip, $nipBaru, $track) {
            $iPegawai++;

            $this->info("PEGAWAI: [{$iPegawai}/{$pegawaiCount}] {$pegawai->nip_baru}");

            try {
                $response = Simpeg::getPnsDataUtama($pegawai->nip_baru);
            } catch (\Exception $e) {
                if ($nipBaru == null && $track) {
                    new PullTrackingErrorService($e, $pullTrackingError, $pullTracking, $pegawai->pns_id);
                }

                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }

            try {
                $model = new PnsDataUtama;

                DB::transaction(function () use ($model, $response) {
                    if (config('siasn-simpeg.delete_model_before_pull')) {
                        $model->delete();
                    }

                    $model->updateOrCreate($response->toArray());
                    $model->withTrashed()
                        ->restore();
                });
            } catch (\Exception $e) {
                if ($nipBaru == null && $track) {
                    new PullTrackingErrorService($e, $pullTrackingError, $pullTracking, $pegawai->pns_id);
                }

                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }

            $pullTracking?->update(['last_try' => $iPegawai]);
            $executedItems = $iPegawai - $skip;

            $this->info(str("All tasks are running for {$startPegawai->shortAbsoluteDiffForHumans(now(), 1)} and {$executedItems} items have been executed.")->upper());
            $this->newLine();
        });

        $pullTracking?->update(['done_at' => now()]);

        return self::SUCCESS;
    }
}
