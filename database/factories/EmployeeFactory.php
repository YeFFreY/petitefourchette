<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstNameFemale,
        'lastName' => $faker->lastName,
        'email' => $faker->email,
        'phoneNumber' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'startDate' => $faker->date(),
        'endDate' => $faker->date(),
    ];
});
