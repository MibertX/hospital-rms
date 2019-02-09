<?php
namespace App\Enums;
use Konekt\Enum\Enum;


class PatientStatus extends Enum
{
	const DEAD = 'dead';
	const HOSPITALIZED = 'hospitalized';
	const OPERATION = 'operation';
	const DISCHARGED = 'discharged';
	const SUPERVISION = 'supervision';
	const __default = self::SUPERVISION;

	public static $labels = [];

	protected static function boot()
	{
		static::$labels = [
			self::DEAD  => __('Dead'),
			self::HOSPITALIZED => __('Hospitalized'),
			self::OPERATION => __('On the operation'),
			self::DISCHARGED => __('Discharged'),
			self::SUPERVISION => __('Medical supervision')
		];
	}
}