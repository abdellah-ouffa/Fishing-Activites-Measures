<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $ppr_number
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Agent extends Model
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
    protected $fillable = ['first_name', 'last_name', 'ppr_number', 'is_active', 'created_at', 'updated_at'];

}
