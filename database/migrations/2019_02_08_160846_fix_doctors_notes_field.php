<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixDoctorsNotesField extends Migration
{
    public function up()
    {
		DB::statement('ALTER TABLE doctors MODIFY `notes` VARCHAR(255) NULL DEFAULT NULL');
    }

    public function down()
    {
		DB::statement('ALTER TABLE doctors MODIFY `notes` VARCHAR(255) NOT NULL');
    }
}
