<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Illuminate\Support\Facades\Artisan;

class PullRiwayatService
{
    public static function jabatan($nipBaru)
    {
        if (filled($nipBaru)) {
            return Artisan::call("siasn-simpeg:pull-riwayat pns-rw-jabatan --nipBaru={$nipBaru}") === 0;
        }

        return false;
    }
}
