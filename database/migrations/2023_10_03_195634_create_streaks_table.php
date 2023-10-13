<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('streaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("project_id")->unsigned();
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->string('description');
            $table->date('date');//date for connection to chain
            $table->time('time');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streaks');
    }
};
