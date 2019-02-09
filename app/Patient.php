<?php
namespace App;
use App\Enums\PatientStatus;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelWithUserData;
use Konekt\Enum\Eloquent\CastsEnums;

class Patient extends Model
{
	use ModelWithUserData, CastsEnums;

	protected $enums = [
		'status' => PatientStatus::class
	];

	protected $fillable = [
		'user_id', 'notes', 'status'
	];

	public function __construct(array $attributes = [])
	{
		if (!isset($attributes['status'])) {
			$this->setDefaultPatientStatus();
		}

		parent::__construct($attributes);
	}

	protected function setDefaultPatientStatus()
	{
		$this->setRawAttributes(
			array_merge($this->attributes, [
					'status' => PatientStatus::defaultValue()
				]
			),true
		);
	}

	public function doctors()
	{
		return $this->belongsToMany(Doctor::class, 'patient_doctor', 'patient_id', 'doctor_id')
			->withPivot('first_visit_at', 'last_visit_at');
	}
}
