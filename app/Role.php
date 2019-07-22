<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Role extends Model
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
     * This is build relationship to Permission Model
     * @return many-to-many
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * This is build relationship to Group Model
     * @return many-to-many
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

}
