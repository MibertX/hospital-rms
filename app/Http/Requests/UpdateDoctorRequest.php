<?php
namespace App\Http\Requests;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
			'user.name' => 'required',
			'user.phone' =>  ['required', Rule::unique('users', 'phone')->ignore($this->doctor ? $this->doctor->user_id : null)],
			'user.email' => ['required', Rule::unique('users', 'email')->ignore($this->doctor ? $this->doctor->user_id: null)],
			'department_id' => 'required'
        ];
    }
}
