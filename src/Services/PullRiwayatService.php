<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Models;

class PullRiwayatService
{
    protected $nipBaru;

    protected $pulled = [];

    protected $pegawai;

    public static function find($nipBaru = null)
    {
        $instance = new self();
        $instance->nipBaru = $nipBaru;
        $instance->pegawai = Models\Pegawai::where('nip_baru', $nipBaru)->first();

        return $instance;
    }

    public function angkakredit()
    {
        $response = Simpeg::getPnsRwAngkakredit($this->nipBaru);

        $this->upsert($response, Models\PnsRwAngkakredit::class, 'pns');

        return $this;
    }

    public function cltn()
    {
        $response = Simpeg::getPnsRwCltn($this->nipBaru);

        $this->upsert($response, Models\PnsRwCltn::class, 'pnsOrangId');

        return $this;
    }

    public function diklat()
    {
        $response = Simpeg::getPnsRwDiklat($this->nipBaru);

        $this->upsert($response, Models\PnsRwDiklat::class, 'idPns');

        return $this;
    }

    public function dp3()
    {
        $response = Simpeg::getPnsRwDp3($this->nipBaru);

        $this->upsert($response, Models\PnsRwDp3::class, 'pnsId');

        return $this;
    }

    public function golongan()
    {
        $response = Simpeg::getPnsRwGolongan($this->nipBaru);

        $this->upsert($response, Models\PnsRwGolongan::class, 'idPns');

        return $this;
    }

    public function hukdis()
    {
        $response = Simpeg::getPnsRwHukdis($this->nipBaru);

        $this->upsert($response, Models\PnsRwHukdis::class, 'pnsOrang');

        return $this;
    }

    public function jabatan()
    {
        $response = Simpeg::getPnsRwJabatan($this->nipBaru);

        $this->upsert($response, Models\PnsRwJabatan::class, 'idPns');

        return $this;
    }

    public function kinerjaperiodik()
    {
        $response = Simpeg::getPnsRwKinerjaperiodik($this->nipBaru);

        $this->upsert($response, Models\PnsRwKinerjaperiodik::class, 'pnsDinilaiId');

        return $this;
    }

    public function kursus()
    {
        $response = Simpeg::getPnsRwKursus($this->nipBaru);

        $this->upsert($response, Models\PnsRwKursus::class, 'idPns');

        return $this;
    }

    public function masakerja()
    {
        $response = Simpeg::getPnsRwMasakerja($this->nipBaru);

        $this->upsert($response, Models\PnsRwMasakerja::class, 'idPns');

        return $this;
    }

    public function pemberhentian()
    {
        $response = Simpeg::getPnsRwPemberhentian($this->nipBaru);

        $this->upsert($response, Models\PnsRwPemberhentian::class, 'pnsOrang');

        return $this;
    }

    public function pendidikan()
    {
        $response = Simpeg::getPnsRwPendidikan($this->nipBaru);

        $this->upsert($response, Models\PnsRwPendidikan::class, 'idPns');

        return $this;
    }

    public function penghargaan()
    {
        $response = Simpeg::getPnsRwPenghargaan($this->nipBaru);

        $this->upsert($response, Models\PnsRwPenghargaan::class, 'pnsOrangId');

        return $this;
    }

    public function pindahinstansi()
    {
        $response = Simpeg::getPnsRwPindahinstansi($this->nipBaru);

        $this->upsert($response, Models\PnsRwPindahinstansi::class, 'pnsOrang');

        return $this;
    }

    public function pnsunor()
    {
        $response = Simpeg::getPnsRwPnsunor($this->nipBaru);

        $this->upsert($response, Models\PnsRwPnsunor::class, 'pnsOrang');

        return $this;
    }

    public function pwk()
    {
        $response = Simpeg::getPnsRwPwk($this->nipBaru);

        $this->upsert($response, Models\PnsRwPwk::class, 'pnsOrang');

        return $this;
    }

    public function skp()
    {
        $response = Simpeg::getPnsRwSkp($this->nipBaru);

        $this->upsert($response, Models\PnsRwSkp::class, 'pns');

        return $this;
    }

    public function skp22()
    {
        $response = Simpeg::getPnsRwSkp22($this->nipBaru);

        $this->upsert($response, Models\PnsRwSkp22::class, 'pnsDinilaiId');

        return $this;
    }

    public function withNotification()
    {
        $status = collect($this->pulled)->every(fn ($value) => $value === true);

        Notification::make()
            ->title($status ? 'Pulled successfully' : 'Something went wrong')
            ->status($status ? 'success' : 'danger')
            ->send();
    }

    protected function upsert($response, $model, $pnsId)
    {
        if ($response->count()) {
            $model = $model::where($pnsId, $this->pegawai->pns_id);

            DB::transaction(function () use ($model, $response, $pnsId) {
                if (config('siasn-simpeg.delete_model_before_pull')) {
                    $model->delete();
                }

                $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $pnsId) {
                    $item = $item->map(function ($item) {
                        if (isset($item['path'])) {
                            $item['path'] = collect($item['path'])->toJson();
                        }

                        return Arr::except($item, [
                            'created_at',
                            'updated_at',
                            'deleted_at',
                        ]);
                    });
                    $model->upsert($item->toArray(), $pnsId);
                    $model->withTrashed()
                        ->whereIn('id', $item->pluck('id'))
                        ->restore();
                });

                $this->pulled[] = true;
            });
        }
    }
}
