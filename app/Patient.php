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
}
