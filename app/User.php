<?php
namespace App;
use App\Enums\GenderEnum;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use  Konekt\AppShell\Models\User as VaniloUser;
use Konekt\Enum\Eloquent\CastsEnums;

class User extends VaniloUser
{
    use Notifiable, CastsEnums;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $enums = [
    	'gender' => GenderEnum::class
	];

    public function getAgeAttribute()
	{
		return Carbon::parse($this->attributes['birthday'])->diffInYears(Carbon::now());
	}
}
