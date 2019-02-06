<?php
use Faker\Generator as Faker;
use App\Department;

$factory->define(Department::class, function (Faker $faker) {
	$departmentNames = [
		'Кардіологія', 'Гастроентерологія', 'Загальна хірургія', 'Гематологія',
		'Мікробіологія', 'Нефрологія', 'Неврологія', 'Онкологія',
		'Офтальмологія', 'Ортопедія', 'Фізіотерапія', 'Ревматологія'
	];

	$currentDepartments = Department::all()->pluck('name')->toArray();

	$availableDepartments = array_diff($departmentNames, $currentDepartments);

	if (!$availableDepartments || !count($availableDepartments))
		return false;

	$needSeparateAddress = false;
	if (rand(1, 10) <= 2) {
		$needSeparateAddress = true;
	}

    return [
        'name' => $faker->unique()->randomElement($departmentNames),
		'housing' => rand(1, 5),
		'address' => $needSeparateAddress ? $faker->address : ''
    ];
});
