<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('employee_profile_id')->nullable();
            $table->unsignedInteger('vacation')->default(0);
            $table->unsignedInteger('sick_leave')->default(0);
            $table->unsignedInteger('maternity_leave')->default(0);
            $table->unsignedInteger('compassionate_leave')->default(0);
            $table->unsignedInteger('personal_leave')->default(0);
            $table->unsignedInteger('other')->default(0);
            $table->string('other_details')->nullable();
            $table->unsignedInteger('total_days')->default(0);
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
        Schema::dropIfExists('leaves');
    }
}
