<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PullTrackingError extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getTable()
    {
        return 'siasn_simpeg_'.str(class_basename(__CLASS__))->snake();
    }

    public function pullTracking(): BelongsTo
    {
        return $this->belongsTo(PullTracking::class);
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pns_id', 'pns_id');
    }
}
