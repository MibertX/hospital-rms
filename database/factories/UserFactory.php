<?php
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
	$gender = $faker->randomElement(['female', 'male']);

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
		'age' => rand('0', '75'),
        'email' => $email,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
		'phone' => $faker->unique()->phoneNumber,
		'address' => $faker->address,
    ];
});
