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

	public function patients()
	{
		return $this->belongsToMany(Patient::class, 'patient_doctor', 'doctor_id', 'patient_id')
			->withPivot('first_visit_at', 'last_visit_at');
	}

	public function department()
	{
		return $this->belongsTo(Department::class, 'department_id');
	}
}
