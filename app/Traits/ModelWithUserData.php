<?php
namespace App\Traits;
use App\User;

trait ModelWithUserData
{
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function getNameAttribute()
	{
		if (!$this->user) return false;

		return $this->user->name;
	}

	public function getEmailAttribute()
	{
		if (!$this->user) return false;

		return $this->user->email;
	}

	public function getAgeAttribute()
	{
		if (!$this->user) return false;

		return $this->user->age;
	}

	public function getAddressAttribute()
	{
		if (!$this->user) return false;

		return $this->user->address;
	}

	public function getPhoneAttribute()
	{
		if (!$this->user) return false;

		return $this->user->phone;
	}

	public function getGenderAttribute()
	{
		if (!$this->user) return false;

		return $this->user->gender;
	}

	public function getBirthdayAttribute()
	{
		if (!$this->user) return false;

		return $this->user->birthday;
	}
}