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
        Schema::create('current_builds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('set_id');
            $table->unsignedBigInteger('flower_id');
            $table->unsignedBigInteger('plume_id');
            $table->unsignedBigInteger('sands_id');
            $table->unsignedBigInteger('goblet_id');
            $table->unsignedBigInteger('circlet_id');
            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('set_id')->references('id')->on('sets');
            $table->foreign('flower_id')->references('id')->on('artifact_type_stat');
            $table->foreign('plume_id')->references('id')->on('artifact_type_stat');
            $table->foreign('sands_id')->references('id')->on('artifact_type_stat');
            $table->foreign('goblet_id')->references('id')->on('artifact_type_stat');
            $table->foreign('circlet_id')->references('id')->on('artifact_type_stat');
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
        Schema::dropIfExists('current_builds');
    }
};
