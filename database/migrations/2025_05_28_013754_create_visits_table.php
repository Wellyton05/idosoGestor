<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->unsignedBigInteger('resident_id');
            $table->string('visitante');
            $table->timestamps();

            // FK para garantir integridade com a tabela de residentes
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
