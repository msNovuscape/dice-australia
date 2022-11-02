<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('email');
            $table->date('dob');
            $table->string('mobile_no');
            $table->string('preferred_language');
            $table->boolean('is_ndis');
            $table->string('ndis_number')->nullable();
            $table->string('ndis_expiry_date')->nullable();
            $table->string('ndis_plan')->nullable();
            $table->string('unit_number');
            $table->string('street_number');
            $table->string('street_name');
            $table->string('suburb');
            $table->string('state_name')->nullable();
            $table->string('postalcode');
            $table->longtext('services_details');
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
        Schema::dropIfExists('referrals');
    }
}
