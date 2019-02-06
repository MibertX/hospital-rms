<?php
use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
	return [
		'status' => $faker->randomElement(['dead', 'on_operation', 'at_the_doctor', 'discharged']),
		'user_id' => $faker->numberBetween(2, 500),
		'department_id' => rand(1, 12),
		'notes' => $faker->text(200),
	];
});
