<?php
use Faker\Generator as Faker;
use App\Enums\GenderEnum;

$factory->define(App\User::class, function (Faker $faker) {
	$gender = $faker->randomElement(
		GenderEnum::values()
	);

	while(true) {
		$email = $faker->unique()->safeEmail;
		if (App\User::where('email', $email)->exists()) {
			continue;
		}

		break;
	}

    return [
		'name' => $faker->name($gender),
		'gender' => $gender == 'female' ? 'female' : 'male',
		'birthday' => $faker->dateTimeBetween($startDate = '-75 years', $endDate = '-18 year'),
        'email' => $email,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
		'phone' => $faker->unique()->phoneNumber,
		'address' => $faker->address,
    ];
});
