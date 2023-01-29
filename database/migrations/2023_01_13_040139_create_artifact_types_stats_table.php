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
        Schema::create('artifact_type_stat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artifact_type_id');
            $table->unsignedBigInteger('stat_id');
            $table->foreign('stat_id')->references('id')->on('stats');
            $table->foreign('artifact_type_id')->references('id')->on('artifact_types');
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
        Schema::dropIfExists('artifact_types_stats');
    }
};
