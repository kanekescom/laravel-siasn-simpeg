<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Eselon;
use Kanekescom\Siasn\Referensi\Models\Instansi;

class ReferensiRefUnor extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

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

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'InstansiId');
    }

    public function diatasan(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'DiatasanId');
    }

    public function eselon(): BelongsTo
    {
        return $this->belongsTo(Eselon::class, 'EselonId');
    }

    public function indukUnor(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'IndukUnorId');
    }
}
