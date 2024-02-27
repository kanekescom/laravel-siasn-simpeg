<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Kanekescom\Siasn\Simpeg\Models\PullTracking;
use Kanekescom\Siasn\Simpeg\Models\PullTrackingError;

class PullTrackingErrorService
{
    public function __construct($e, PullTrackingError $pullTrackingError, PullTracking $pullTracking, string $pns_id)
    {
        return $pullTrackingError->updateOrCreate([
            'pull_tracking_id' => $pullTracking->id,
            'pns_id' => $pns_id,
        ], [
            'error' => $e,
        ]);
    }
}
