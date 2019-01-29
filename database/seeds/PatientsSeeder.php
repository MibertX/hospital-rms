<?php
use Illuminate\Database\Seeder;
use App\Patient;

class PatientsSeeder extends Seeder
{
	protected $needCreate = 250;

    public function run()
    {
		Patient::truncate();

    	$users = factory(Patient::class, $this->needCreate)->make();
    	foreach ($users as $user) {
    		$user->save();
		}
    }
}
