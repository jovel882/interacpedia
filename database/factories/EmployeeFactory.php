<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
        'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->companyEmail,
        'phone' => $faker->randomNumber(5,false),
    ];
});
