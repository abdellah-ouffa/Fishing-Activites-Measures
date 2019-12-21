<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $module_id
 * @property integer $scholar_year_id
 * @property string $title
 * @property string $description
 * @property string $video_content
 * @property string $published_at
 * @property integer $duration
 * @property string $created_at
 * @property string $updated_at
 * @property Teacher $teacher
 * @property Message[] $messages
 */
class Course extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\CourseFilter::class);
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
        'module_id',
        'teacher_id',
        'title',
        'description',
        'video_content',
        'published_at',
        'duration',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'course_id');
    }

    /*
    * Scope queries
    */
    public function scopeCurrentYear($query)
    {
        return $query->whereHas('module', function ($moduleQuery) {
            return $moduleQuery->whereHas('classe', function ($classeQuery) {
                $classeQuery->where('scholar_year_id', config('scholaryear.current_scholar_year_id'));
            });
        });
    }
}
