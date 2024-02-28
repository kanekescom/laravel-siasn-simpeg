<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pns_id';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'path' => 'array',
    ];

    public function getTable()
    {
        return 'siasn_simpeg_'.str(class_basename(__CLASS__))->snake();
    }

    public function kinerjas(): HasMany
    {
        return $this->hasMany(PnsRwSkp22::class, 'pnsDinilaiId');
    }

    public function scopePns($query)
    {
        return $query
            ->whereNotIn('kedudukan_hukum_id', [71, 72, 73]);
    }

    public function scopePppk($query)
    {
        return $query
            ->whereIn('kedudukan_hukum_id', [71, 72, 73]);
    }
}
