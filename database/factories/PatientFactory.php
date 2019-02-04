<?php
use Faker\Generator;

$factory->define(App\Patient::class, function (Generator $faker) {
	$userIds = \App\Patient::get()->pluck('user_id')->toArray();

	do {
		$userId = rand(2, 261);
	} while(in_array($userId, $userIds));

    return [
		'status' => $faker->randomElement(['dead', 'hospitalized', 'on_operation', 'at_the_doctor', 'discharged']),
		'user_id' => $userId,
		'notes' => $faker->text(200),
		'token' => str_random(20),
    ];
});
