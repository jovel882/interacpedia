<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (User::create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("SuperAdministrator");
        (User::create([
            'name' => "Empresas",
            'email' => "empresas@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("Empresas");
        (User::create([
            'name' => "EmpresasConsultas",
            'email' => "empresasconsultas@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("EmpresasConsultas");
        (User::create([
            'name' => "EmpresasGestion",
            'email' => "empresasgestion@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("EmpresasGestion");
        (User::create([
            'name' => "Empleados",
            'email' => "empleados@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("Empleados");
        (User::create([
            'name' => "EmpleadosConsultas",
            'email' => "empleadosconsultas@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("EmpleadosConsultas");
        (User::create([
            'name' => "EmpleadosGestion",
            'email' => "empleadosgestion@admin.com",
            'password' => bcrypt('password'),
        ]))->assignRole("EmpleadosGestion");
    }
}
