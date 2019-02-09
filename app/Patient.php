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

	public function doctors()
	{
		return $this->belongsToMany(Doctor::class, 'patient_doctor', 'patient_id', 'doctor_id')
			->withPivot('first_visit_at', 'last_visit_at');
	}
}
