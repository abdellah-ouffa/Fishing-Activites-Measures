<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $class_id
 * @property string $title
 * @property string $color
 * @property string $created_at
 * @property string $updated_at
 * @property Classe $classe
 * @property Course $courses
 */
class Module extends Model
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
        'classe_id', 
        'title', 
        'color', 
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
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'module_id');
    }
}
