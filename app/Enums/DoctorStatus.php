<?php
namespace App\Enums;
use Konekt\Enum\Enum;

class DoctorStatus extends Enum
{
	const FIRED = 'fired';
	const VACATION = 'vacation';
	const SICK_LEAVED = 'sick_leaved';
	const OPERATION = 'operation';

	public static $labels = [];

	protected static function boot()
	{
		static::$labels = [
			self::FIRED  => __('Fired'),
			self::VACATION => __('On Vacation'),
			self::SICK_LEAVED => __('Sick Leaved'),
			self::OPERATION => __('On Operation')
		];
	}
}
