<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('seo_type');
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->string('keyword')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->enum('status',[1,2]);
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
        Schema::dropIfExists('seo_titles');
    }
}
