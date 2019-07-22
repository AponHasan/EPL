<?php

namespace App;

use App\Traits\UserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Leave;
use App\UserProile;
use App\UserEmploymentHistory;

class User extends Authenticatable
{
    use Notifiable,UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates=['deleted_at'];

    /**
     * This Build relations between Role Model
     * @return many-to-many
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * This Build relations to Group Model
     * @return many-to-many
     */
   

    /**
     * This Build relations to Permission Model
     * @return many-to-many
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * This Build a relations to Leave Model
     * @return many-to-many
     */

     
}
