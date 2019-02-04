<?php
use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorSeeder extends Seeder
{
	protected $needCreate = 60;
    public function run()
    {
		Doctor::truncate();

		$doctors = factory(Doctor::class, $this->needCreate)->make();
		foreach ($doctors as $doctor) {
			$doctor->save();
		}
    }
}
