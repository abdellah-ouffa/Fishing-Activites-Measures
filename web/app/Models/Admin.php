<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $picture
 * @property string $email
 * @property string $password
 * @property string $visible_password
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Admin extends Model
{
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\AdminFilter::class);
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
        'picture', 
        'email', 
        'password', 
        'visible_password', 
        'created_at', 
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
