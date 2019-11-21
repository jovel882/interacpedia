<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dispatcher = Company::getEventDispatcher();
        Company::unsetEventDispatcher();
        factory(Company::class,50)->create(); 
        Company::setEventDispatcher($dispatcher);        
    }
}
