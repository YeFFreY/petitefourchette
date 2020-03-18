<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CashBook;
use Faker\Generator as Faker;

$factory->define(CashBook::class, function (Faker $faker) {
    return [
        'service_id' => $faker->word,
        'start_at' => $faker->dateTime(),
        'created_by' => function() {
            return factory('App\User')->create()->id;
        }
    ];
});
