<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $category_id
 * @property integer $measure_id
 * @property string $name
 * @property string $scientific_name
 * @property string $french_name
 * @property string $commercial_size
 * @property string $image
 * @property string $measurement_standards
 * @property string $additionnal_attributes
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Measure $measure
 */
class Fish extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fishes';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
    
    protected $with = ['category'];

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'measure_id', 'name', 'scientific_name', 'french_name', 'commercial_size', 'image', 'measurement_standards', 'additionnal_attributes', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measure()
    {
        return $this->belongsTo(Measure::class, 'measure_id');
    }
}
