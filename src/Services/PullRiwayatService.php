<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Artisan;

class PullRiwayatService
{
    protected $pulled = false;

    public static function make()
    {
        return new self();
    }

    public function jabatan($nipBaru)
    {
        try {
            Artisan::call("siasn-simpeg:pull-riwayat pns-rw-jabatan --nipBaru={$nipBaru}");

            $this->pulled = true;
        } catch (\Error $e) {
            //
        }

        return $this;
    }

    public function withNotification()
    {
        if ($this->pulled) {
            Notification::make()
                ->title('Pulled successfully')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Something went wrong')
                ->danger()
                ->send();
        }

        return $this;
    }
}
