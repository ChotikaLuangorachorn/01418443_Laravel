<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWord=3),
        'status' => $faker->randomElement([
          'development','release', 'stable','obsolete'
        ]),        
        'view_status' => $faker->randomElement([
          'public','private'
        ]),
        'description' => $faker->text
    ];
});
