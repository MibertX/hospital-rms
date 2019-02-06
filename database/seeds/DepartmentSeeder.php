<?php
use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
	protected $needCreate = 12;

	public function run()
	{
		Department::truncate();

		$users = factory(Department::class, $this->needCreate)->make();
		foreach ($users as $user) {
			$user->save();
		}
	}
}
