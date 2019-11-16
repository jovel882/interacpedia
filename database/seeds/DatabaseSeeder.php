<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            "companies",
            "employees",
        ]);        
        $this->call(CompaniesSeeder::class);
        $this->call(EmployeesSeeder::class);
    }
    /**
     * Trunca todas las tablas enviadas en el array
     * @param array $tables Array con los nombres de las tablas a truncar.
     */
    protected function truncateTables(array $tables):void{
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement("SET FOREIGN_KEY_CHECKS=1");        
    }        
}
