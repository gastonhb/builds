<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_substat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('build_id');
            $table->unsignedBigInteger('substat_id');
            $table->foreign('build_id')->references('id')->on('builds');
            $table->foreign('substat_id')->references('id')->on('substats');
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
        Schema::dropIfExists('build_substats');
    }
};
