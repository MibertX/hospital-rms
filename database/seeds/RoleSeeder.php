<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
    	DB::table('roles')->truncate();
        $roles = ['admin', 'patient', 'doctor'];
        foreach ($roles as $roleName) {
        	DB::table('roles')->insert([
        		'name' => $roleName,
				'guard_name' => 'web',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			]);
		}
    }
}
