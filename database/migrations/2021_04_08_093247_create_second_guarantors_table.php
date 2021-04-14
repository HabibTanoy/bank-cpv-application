<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_guarantors', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('present_address')->nullable();
            $table->string('nid_address')->nullable();
            $table->string('office_business_name')->nullable();
            $table->string('office_business_address')->nullable();
            $table->string('designation')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('second_guarantors_image')->nullable();
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
        Schema::dropIfExists('second_guarantors');
    }
}
