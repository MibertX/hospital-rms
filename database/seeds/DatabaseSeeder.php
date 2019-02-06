<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call(UserSeeder::class);
		$this->call(DepartmentSeeder::class);
		$this->call(PatientsSeeder::class);
		$this->call(DoctorSeeder::class);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
