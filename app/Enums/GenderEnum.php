<?php
namespace App\Enums;
use Konekt\Enum\Enum;


class GenderEnum extends Enum
{
	const MALE = 'male';
	const FEMALE = 'female';

	public static $labels = [];

	protected static function boot()
	{
		static::$labels = [
			self::MALE=> __('Man'),
			self::FEMALE=> __('Woman'),
		];
	}
}