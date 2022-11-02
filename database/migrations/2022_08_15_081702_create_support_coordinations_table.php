<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportCoordinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_coordinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->date('dob');
            $table->string('phone');
            $table->string('sup_cor_com_name');
            $table->string('sup_cor_email');
            $table->string('sup_cor_com_phone');
            $table->boolean('is_sup_cor');
            $table->string('agreement_start_date');
            $table->string('agreement_end_date');
            $table->boolean('is_nominee');
            $table->string('ndis_number')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_email')->nullable();
            $table->string('file');
            $table->string('nominee_phone')->nullable();
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
        Schema::dropIfExists('support_coordinations');
    }
}
