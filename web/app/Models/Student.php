<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $birth_date
 * @property string $cin
 * @property string $cne
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Classe[] $classes
 */
class Student extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\StudentFilter::class);
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
        'registration_number', 
        'address', 
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
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'registrations')
                    ->as('registrations')
                    ->withPivot('classe_id', 'student_id');
    }

    public function getCurrentClasseAttribute()
    {
        return $this->classes()
                    ->get()
                    ->where('scholar_year_id', config('scholaryear.current_scholar_year_id'))
                    ->first();
    }

    public function getCurrentLevelAttribute()
    {
        $currentClasse = $this->currentClasse;
        $subLevel = optional(optional($currentClasse)->subLevel())->first();
        
        return $subLevel ? optional($subLevel->level())->first() : null;
    }

    public function getCurrentSubLevelAttribute()
    {
        return optional(optional($this->currentClasse)->subLevel())->first();
    }

    public function getActiveAttribute()
    {
        return $this->user->is_active;
    }
}
