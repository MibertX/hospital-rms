<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		return [
			'user.name' => 'required',
			'user.phone' =>  ['required', Rule::unique('users', 'phone')->ignore($this->patient ? $this->patient->user_id : null)],
			'user.email' => ['required', Rule::unique('users', 'email')->ignore($this->patient ? $this->patient->user_id: null)],
		];
    }
}
