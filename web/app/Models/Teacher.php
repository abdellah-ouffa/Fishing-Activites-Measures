<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $birth_date
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Course[] $courses
 */
class Teacher extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\TeacherFilter::class);
    }

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
        'user_id', 
        'birth_date', 
        'created_at', 
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'birth_date', 
        'created_at', 
        'updated_at'
    ];

    protected $with = ['user'];    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
}
