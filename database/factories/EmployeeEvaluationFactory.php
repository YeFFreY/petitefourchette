<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeEvaluation;
use Faker\Generator as Faker;

$factory->define(EmployeeEvaluation::class, function (Faker $faker) {
    return [
        'body' => $faker->sentences(4),
    ];
});
