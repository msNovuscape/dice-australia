<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('image_title');
            // $table->string('image');
            // $table->string('description_title');
            // $table->string('image_description');
            // $table->longText('top_description');
            // $table->longText('bottom_description');
            // $table->string('point_title');
            $table->string('seo_title');
            $table->longText('seo_description');
            $table->string('keywords');
            $table->longText('meta_keywords');
            $table->enum('status',[1,2]);
            // $table->string('image_alt')->nullable();
            $table->string('order_by');
            $table->string('slug');
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
        Schema::dropIfExists('services');
    }
}
