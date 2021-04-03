<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('application_id')->nullable();
            $table->string('name');
            $table->string('phone_number');
            $table->string('present_address');
            $table->string('nid_address');
            $table->string('office_business_name');
            $table->string('office_business_address');
            $table->string('designation');
            $table->string('nid');
            $table->string('applicant_image');
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
        Schema::dropIfExists('applications');
    }
}
