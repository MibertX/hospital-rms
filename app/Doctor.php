<?php
namespace App;
use App\Enums\DoctorStatus;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelWithUserData;
use Konekt\Enum\Eloquent\CastsEnums;

class Doctor extends Model
{
	use ModelWithUserData, CastsEnums;

	protected $enums = [
		'status' => DoctorStatus::class
	];

	protected $fillable = [
		'user_id', 'department_id', 'notes', 'status'
	];

	public function __construct(array $attributes = [])
	{
		if (!isset($attributes['status'])) {
			$this->setDefaultDoctorStatus();
		}

		parent::__construct($attributes);
	}

	protected function setDefaultDoctorStatus()
	{
		$this->setRawAttributes(
			array_merge($this->attributes, [
					'status' => DoctorStatus::defaultValue()
				]
			),true
		);
	}

}
