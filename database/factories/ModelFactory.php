<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Street::class, function (Faker\Generator $faker) {
    return [
        'city_id' => function () {
            return factory(App\City::class)->create()->id;
        },
        'name' => $faker->name,
    ];
});


$factory->define(App\Suite::class, function (Faker\Generator $faker) {
    return [
        'street_id' => function () {
            return factory(App\Street::class)->create()->id;
        },
        'address' => $faker->address,
        'type' => $faker->randomElement(\App\Suite::listType()),
        'status' => $faker->randomElement(\App\Suite::listStatus()),
        'note' => $faker->paragraph,
    ];
});
