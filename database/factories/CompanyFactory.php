<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'logo' => $faker->imageUrl(200, 150, 'technics',true, 'Interacpedia'),
        'website' => $faker->url,
    ];
});
