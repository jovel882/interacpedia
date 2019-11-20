<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        /*Genera la creacion del menu.
         * @author John Fredy Velasco Bareño <jvelasco@awake.travel>
         * 
         */        
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menu=[
                ['header' => __("page.menu.title")],
                [
                    'text' => __("page.menu.companies"),
                    'url' => route('companies.index',["lang" => app()->getLocale()]),
                    'icon' => 'fas fa-fw fa-building',
                    'permission' => ["CompaniesCreate","CompaniesEdit","CompaniesView","CompaniesDelete"],
                ],                
                [
                    'text' => __("page.menu.employees"),
                    'url' => route('employees.index',["lang" => app()->getLocale()]),
                    'icon' => 'fas fa-fw fa-users',
                    'permission' => ["EmployeesCreate","EmployeesEdit","EmployeesView","EmployeesDelete"],
                ],                
            ];
            foreach ($menu as $item){
                $event->menu->add($item);
            }            
        });
    }
}
