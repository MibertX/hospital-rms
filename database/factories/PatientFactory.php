<?php
use Faker\Generator;

$factory->define(App\Patient::class, function (Generator $faker) {
    return [
		'status' => $faker->randomElement(['dead', 'hospitalized', 'on_operation', 'at_the_doctor', 'discharged']),
		'user_id' => $faker->unique()->numberBetween(2, 401),
		'notes' => $faker->text(200),
		'token' => str_random(20),
    ];
});
