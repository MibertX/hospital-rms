<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('patient_doctor', function (Blueprint $table) {
			$table->integer('patient_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
			$table->dateTime('first_visit_at');
			$table->dateTime('last_visit_at');

			$table->primary(['doctor_id', 'patient_id']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('patient_doctor');
    }
}
