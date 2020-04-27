<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $measure_id
 * @property string $name
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property Measure $measure
 * @property MeasureAttributeZone[] $measureAttributeZones
 */
class MeasureAttribute extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['measure_id', 'name', 'value', 'created_at', 'updated_at'];
    // protected $with = ['zones'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measure()
    {
        return $this->belongsTo(Measure::class, 'measure_id');
    }
}
