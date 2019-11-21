<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'SuperAdministrator']);
        
        (Role::create(['name' => 'Empresas']))->givePermissionTo(Permission::where('name', 'like', 'Companies%')->get());

        (Role::create(['name' => 'EmpresasConsultas']))->givePermissionTo(["CompaniesView"]);
        
        (Role::create(['name' => 'EmpresasGestion']))->givePermissionTo(["CompaniesCreate","CompaniesEdit"]);
        
        (Role::create(['name' => 'Empleados']))->givePermissionTo(Permission::where('name', 'like', 'Employees%')->get());        
        
        (Role::create(['name' => 'EmpleadosConsultas']))->givePermissionTo(["EmployeesView"]);
        
        (Role::create(['name' => 'EmpleadosGestion']))->givePermissionTo(["EmployeesCreate","EmployeesEdit"]);
    }
}
