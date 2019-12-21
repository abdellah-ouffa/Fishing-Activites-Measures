<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $sub_level_id
 * @property integer $scholar_year_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property SubLevel $subLevel
 * @property Module[] $modules
 * @property Student[] $students
 * @property SchoolarYear $scholar_year
 */
class Classe extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ClasseFilter::class);
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
        'sub_level_id',
        'scholar_year_id',
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

    protected $with = ['scholarYear'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subLevel()
    {
        return $this->belongsTo(SubLevel::class, 'sub_level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scholarYear()
    {
        return $this->belongsTo(ScholarYear::class, 'scholar_year_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class, 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'registrations')
                    ->as('registrations')
                    ->withPivot('student_id', 'classe_id');
    }

    /*
    * Scope queries
    */
    public function scopeCurrentYear($query)
    {
        return $query->where('scholar_year_id', config('scholaryear.current_scholar_year_id'));
    }
}
