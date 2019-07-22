<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    /**
     * This is build relationship to User Model
     * @return many-to-many
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * This is build relationship to Role Model
     * @return many-to-many
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
