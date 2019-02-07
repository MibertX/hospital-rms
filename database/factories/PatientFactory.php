<?php
use Faker\Generator;
use App\Enums\PatientStatus;
use App\Patient;

$factory->define(Patient::class, function (Generator $faker) {
    return [
		'status' => $faker->randomElement(PatientStatus::values()),
		'user_id' => $faker->unique()->numberBetween(2, 401),
		'notes' => $faker->text(200),
		'token' => str_random(20),
    ];
});
