<?php
use Faker\Generator;

$factory->define(App\Patient::class, function (Generator $faker) {
	$gender = $faker->randomElement(['female', 'male']);

    return [
        'name' => $faker->name($gender),
		'gender' => $gender == 'female' ? 'female' : 'male',
		'status' => $faker->randomElement(['dead', 'hospitalized', 'on_operation', 'at_the_doctor', 'discharged']),
		'age' => rand('0', '90'),
		'notes' => $faker->text(200),
		'phone' => $faker->unique()->phoneNumber,
		'email' => $faker->unique()->safeEmail,
		'address' => $faker->address,
		'token' => str_random(20),
    ];
});
