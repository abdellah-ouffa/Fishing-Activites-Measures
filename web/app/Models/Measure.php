<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Fish[] $fishes
 * @property MeasureAttribute[] $measureAttributes
 */
class Measure extends Model
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
    protected $fillable = ['name', 'created_at', 'updated_at'];

    protected $with = ['measureAttributes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fishes()
    {
        return $this->hasMany(Fish::class, 'measure_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function measureAttributes()
    {
        return $this->hasMany(MeasureAttribute::class, 'measure_id');
    }
}
