<?php
use Illuminate\Database\Seeder;
use Konekt\Acl\Models\Permission;
use Illuminate\Support\Facades\DB;
use Konekt\Acl\Models\Role;

class PermisionSeeder extends Seeder
{
    public function run()
    {
		DB::table('role_permissions')->truncate();
		DB::table('permissions')->truncate();
		Permission::truncate();

        $adminOnlyPermissions = [
        	'list users', 'create users', 'view users', 'edit users', 'delete users',
			'list roles', 'create roles', 'view roles', 'edit roles', 'delete roles',
			'list settings', 'create settings', 'view settings', 'edit settings', 'delete settings',
			'list departments', 'create departments', 'edit departments', 'delete departments',
			'list patients',
			'list doctors', 'view doctors'
		];

		$patientPermissions = ['list departments', 'list doctors'];
		$doctorsPermissions = ['list departments', 'list patients', 'list doctors'];

		$permissions = array_unique(array_merge(
			$adminOnlyPermissions,
			$patientPermissions,
			$doctorsPermissions
		));

		$adminRole = Role::where('name', 'admin')->first();
		$patientRole = Role::where('name', 'patient')->first();
		$doctorRole = Role::where('name', 'doctor')->first();

        foreach ($permissions as $permissionName) {
        	DB::table('permissions')->insert(['name' => $permissionName, 'guard_name' => 'web']);
        	$permission = DB::table('permissions')->where('name', $permissionName)->first();

			DB::table('role_permissions')->insert([
				'permission_id' => $permission->id,
				'role_id' => $adminRole->id
			]);

			if (in_array($permissionName, $patientPermissions)) {
				DB::table('role_permissions')->insert([
					'permission_id' => $permission->id,
					'role_id' => $patientRole->id
				]);
			}

			if (in_array($permissionName, $doctorsPermissions)) {
				DB::table('role_permissions')->insert([
					'permission_id' => $permission->id,
					'role_id' => $doctorRole->id
				]);
			}
		}
    }
}
