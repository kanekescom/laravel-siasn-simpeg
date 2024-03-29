<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PullTracking extends Model
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

    public function errors(): HasMany
    {
        return $this->hasMany(PullTrackingError::class);
    }
}
