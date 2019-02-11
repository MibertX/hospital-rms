<?php
use Illuminate\Database\Seeder;
use App\Doctor;
use Konekt\Acl\Models\Role;

class DoctorSeeder extends Seeder
{
	protected $needCreate = 100;

    public function run()
    {
		Doctor::truncate();

		$doctorRole= Role::where('name', 'doctor')->first();
		$doctors = factory(Doctor::class, $this->needCreate)->make();
		foreach ($doctors as $doctor) {
			$doctor->save();

			DB::table('model_roles')->insert([
				'role_id' => $doctorRole->id,
				'model_type' => 'App\User',
				'model_id' => $doctor->user_id
			]);
		}
    }
}
