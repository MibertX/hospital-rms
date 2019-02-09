<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PatientDoctorSeeder extends Seeder
{
    public function run(Faker $faker)
    {
		DB::table('patient_doctor')->truncate();
        $doctors = \App\Doctor::all();
        $patientIds = \App\Patient::all()->pluck('id')->toArray();

        foreach ($doctors as $doctor) {
			$doctorPatientIds = array_rand($patientIds, rand(10, 40));
			foreach ($doctorPatientIds as $patientId) {
				$firstVisitDate = $faker->date('Y-m-d H:i:s');
				DB::table('patient_doctor')->insert([
					'doctor_id' => $doctor->id,
					'patient_id' => $patientId,
					'first_visit_at' => $firstVisitDate,
					'last_visit_at' => \Carbon\Carbon::parse($firstVisitDate)->addDays(rand(2, 60))
				]);
			}
		}
    }
}
