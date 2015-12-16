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

$factory->define(App\User::class, function ($faker) {
    return [
        'vch_usuario' => $faker->user,
        'vch_nombres' => $faker->name,
        'vch_apellidos' => $faker->lastname,
        'vch_email' => $faker->email,
        'vch_password' => str_random(10),
        'remember_token' => str_random(10),
        'int_tipo' => $faker->type,
        'vch_pais' => $faker->country,
        'int_sexo' => $faker->sex,
    ];
});
