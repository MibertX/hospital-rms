<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('model_class')->nullable();
			$table->integer('model_id')->nullable();
			$table->timestamps();
		});
    }


    public function down()
    {
        Schema::dropIfExists('events');
    }
}
