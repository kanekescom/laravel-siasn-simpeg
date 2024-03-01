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
        if ($this->response->object()->success) {
            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Something went wrong')
                ->danger()
                ->send();
        }
    }

    protected function pullRiwayat()
    {
        PullRiwayatService::make()
            ->jabatan($this->nipBaru)
            ->withNotification();
    }
}
