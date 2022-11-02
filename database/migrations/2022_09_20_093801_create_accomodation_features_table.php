<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_features', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('accomodation_id')->unsigned();
            $table->foreign('accomodation_id')->references('id')->on('accomodations')->onDelete('cascade');
            $table->string('feature_name');
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
        Schema::dropIfExists('accomodation_features');
    }
}
