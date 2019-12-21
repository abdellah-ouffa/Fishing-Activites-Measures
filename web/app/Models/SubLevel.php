<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $level_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property Level $level
 * @property Class[] $classes
 */
class SubLevel extends Model
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
    protected $fillable = [
        'level_id', 
        'title', 
        'created_at', 
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'sub_level_id');
    }
}
