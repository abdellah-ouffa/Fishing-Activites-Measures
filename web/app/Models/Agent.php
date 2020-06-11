<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

/**
 * @property integer $id
 * @property User $user
 * @property string $created_at
 * @property string $updated_at
 */
class Agent extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\AgentFilter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
        'created_at', 
        'updated_at'
    ];

    /**
     * Get the image path of User
     *
     * @return string
     */
    public function getPicturePathAttribute() {
        return $this->picture 
                ? asset('storage/' . $this->picture)
                : asset('assets/img/profile-pic-l.png');
    }

}
