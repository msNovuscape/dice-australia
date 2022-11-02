<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSectionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_section_points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_section_id')->unsigned();
            $table->foreign('service_section_id')->references('id')->on('service_sections')->onDelete('cascade');
            $table->string('point');
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
        Schema::dropIfExists('service_section_points');
    }
}
