<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'created_by' => function() {
            return factory('App\User')->create()->id;
        }
    ];
});
