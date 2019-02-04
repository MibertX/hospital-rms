<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    public function up()
    {
		Schema::table('users', function (Blueprint $table) {
			$table->string('gender')->nullable();
			$table->integer('age')->unsigned()->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
		});

		Schema::table('patients', function(Blueprint $table) {
			$table->dropColumn('name');
			$table->dropColumn('email');
			$table->dropColumn('age');
			$table->dropColumn('address');
			$table->dropColumn('phone');
			$table->dropColumn('gender');
		});
    }

    public function down()
    {
		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('gender');
			$table->dropColumn('age');
			$table->dropColumn('phone');
			$table->dropColumn('addreess');
		});
    }
}
