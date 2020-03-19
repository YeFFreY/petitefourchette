<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Requests\StartCashbook;
use Faker\Generator as Faker;

$factory->define(StartCashbook::class, function (Faker $faker) {
    return [
      'service_id' => $faker->word,
      'start_at' => $faker->dateTime(),
      'initial_balance' => $this->faker->numberBetween(500, 10000)
    ];
});
