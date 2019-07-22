<?php
namespace App\Traits;
trait UserTrait
{
    /**
     * @return bool
     * @param  roles
     * @var array
     */
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    /**
     * @var string
     * @return bool
     * @param role
     */
    public function hasRole($role)
    {
        if($this->roles()->where('slug',$role)->first()){
            return true;
        }
        return false;
    }

}