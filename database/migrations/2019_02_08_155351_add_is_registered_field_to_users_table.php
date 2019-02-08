<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsRegisteredFieldToUsersTable extends Migration
{
	public function up()
	{
		DB::statement('ALTER TABLE users MODIFY `password` VARCHAR(255) NULL DEFAULT NULL');

		Schema::table('users', function (Blueprint $table) {
			$table->boolean('is_registered')->default(true);
		});
	}


	public function down()
	{
		DB::statement('ALTER TABLE users MODIFY `password` VARCHAR(255) NOT NULL');

		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('is_registered');
		});
	}
}
