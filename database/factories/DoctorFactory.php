<?php
use Faker\Generator as Faker;
use App\Enums\DoctorStatus;

$factory->define(App\Doctor::class, function (Faker $faker) {
	return [
		'status' => $faker->randomElement(DoctorStatus::values()),
		'user_id' => $faker->unique()->numberBetween(402, 501),
		'department_id' => rand(1, 12),
		'notes' => $faker->text(200),
	];
});
