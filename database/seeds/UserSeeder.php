<?php
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
	protected $needCreate = 300;

	public function run()
	{
		User::truncate();
		User::create([
			'email' => 'support@rms.com',
			'name' => 'Support',
			'password' => bcrypt('1234qwer')
		]);

		$users = factory(User::class, $this->needCreate)->make();

		foreach ($users as $user) {
			$user->save();
		}
	}
}
