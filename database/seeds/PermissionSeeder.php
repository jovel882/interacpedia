<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'CompaniesCreate']);
        Permission::create(['name' => 'CompaniesEdit']);
        Permission::create(['name' => 'CompaniesView']);
        Permission::create(['name' => 'CompaniesDelete']);      
        Permission::create(['name' => 'EmployeesCreate']);
        Permission::create(['name' => 'EmployeesEdit']);
        Permission::create(['name' => 'EmployeesView']);
        Permission::create(['name' => 'EmployeesDelete']);      
    }
}
