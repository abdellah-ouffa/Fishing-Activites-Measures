<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $location
 * @property string $created_at
 * @property string $updated_at
 * @property MeasureAttributeZone[] $measureAttributeZones
 */
class Zone extends Model
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
    protected $fillable = ['location', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function measureAttribute()
    {
        return $this->belongsToMany(MeasureAttribute::class, 'measure_attribute_zones', 'zone_id', 'attribute_id')
                    ->as('MeasureAttributeZone');
                    // ->withPivot('attribute_id', 'zone_id', 'created_at', 'updated_at');
    }
}
