<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
		return [
			'user.name' => 'required',
			'user.phone' => ['required', Rule::unique('users', 'phone')],
			'user.email' => ['required', Rule::unique('users', 'email')],
			'department_id' => 'required'
		];
    }
}
