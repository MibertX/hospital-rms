<?php
use Illuminate\Database\Seeder;
use App\Patient;
use Konekt\Acl\Models\Role;

class PatientsSeeder extends Seeder
{
	protected $needCreate = 400;

    public function run()
    {
		Patient::truncate();

    	$patients = factory(Patient::class, $this->needCreate)->make();
    	$patientRole = Role::where('name', 'patient')->first();

    	foreach ($patients as $patient) {
			$patient->save();

			DB::table('model_roles')->insert([
				'role_id' => $patientRole->id,
				'model_type' => 'App\User',
				'model_id' => $patient->user_id
			]);
		}
    }
}
