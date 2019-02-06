<?php
use Illuminate\Database\Seeder;
use App\User;
use Konekt\Acl\Models\Role;

class UserSeeder extends Seeder
{
	protected $needCreate = 500;

	public function run()
	{
		User::truncate();
		DB::table('model_roles')->truncate();

		$adminUser = User::create([
			'email' => 'support@rms.com',
			'name' => 'Support',
			'password' => bcrypt('1234qwer')
		]);

		DB::table('model_roles')->insert([
			'role_id' => Role::where('name', 'admin')->first()->id,
			'model_type' => 'App\User',
			'model_id' => $adminUser->id
		]);

		$users = factory(User::class, $this->needCreate)->make();

		foreach ($users as $user) {
			$user->save();
		}
	}
}
