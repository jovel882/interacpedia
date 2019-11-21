<?php

namespace App;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Spatie\Permission\Models\Permission;

class MenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if(auth()->user()->hasRole('SuperAdministrator')){
            return $item;
        }
        $user_permissions=\APP\User::getPermitions();
        if (isset($item['permission'])) {
            $bool_authorise=false;
            foreach($item['permission'] as $permission){
                if(in_array($permission,$user_permissions)){
                    $bool_authorise=true;
                    break;
                }                
            }
            
            if($bool_authorise==true){
                return $item;
            }
            else{
                return false;
            }
        }
        else{
            return $item;
        }
    }
}

