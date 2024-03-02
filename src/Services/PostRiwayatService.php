<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Filament\Notifications\Notification;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;

class PostRiwayatService
{
    protected $data;

    protected $record;

    protected $only;

    protected $response;

    protected $nipBaru;

    protected $riwayat;

    protected $notification = false;

    protected $refresh = false;

    public function send()
    {
        $query = collect($this->record->toArray())
            ->merge($this->data)
            ->only($this->only)
            ->reject(fn ($value) => $value === null || $value === '')
            ->toArray();

        $this->response = Simpeg::postJabatanSave($query);

        if ($this->notification) {
            $this->handleNotification();
        }

        $this->pullRiwayat();

        return $this;
    }

    public function withNotification(bool $notification = true)
    {
        $this->notification = $notification;

        return $this;
    }

    public function withRefresh(bool $refresh = true)
    {
        $this->refresh = $refresh;

        return $this;
    }

    protected function handleNotification()
    {
        $status = $this->response->object()->success;

        Notification::make()
            ->title($status ? 'Saved successfully' : 'Something went wrong')
            ->status($status ? 'success' : 'danger')
            ->send();

        return $this;
    }

    protected function pullRiwayat()
    {
        PullRiwayatService::find($this->nipBaru)
            ->jabatan()
            ->withNotification();
    }
}
