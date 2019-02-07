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
}
