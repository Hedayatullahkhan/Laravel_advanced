<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->nullable();
            $table->string('first_name',100);
            $table->string('last_name', 100);
            $table->string('position', 100);
            $table->double('salary', 100);
            $table->string('gender');
            $table->string('status')->nullable();
            $table->string('blood_group', 5);
            $table->string('image_path', 255)->default('noImage.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
