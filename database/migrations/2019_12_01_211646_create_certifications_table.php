<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('employee_profile_id')->nullable();
            $table->string('name')->nullable();
            $table->string('examining_body')->nullable();
            $table->string('credential_id')->nullable();
            $table->date('issued_on')->nullable();
            $table->boolean('expires')->nullable();
            $table->date('expires_on')->nullable();
            $table->string('credential_url')->nullable();           
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
        Schema::dropIfExists('certifications');
    }
}
