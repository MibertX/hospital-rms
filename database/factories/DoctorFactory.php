<?php
use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
	$userIds = \App\Doctor::get()->pluck('user_id')->toArray();

	do {
		$userId = rand(242, 301);
	} while(in_array($userId, $userIds));

	return [
		'status' => $faker->randomElement(['dead', 'on_operation', 'at_the_doctor', 'discharged']),
		'user_id' => $userId,
		'department_id' => rand(1, 10),
		'notes' => $faker->text(200),
	];
});
