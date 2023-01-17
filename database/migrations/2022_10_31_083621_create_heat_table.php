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
        Schema::create('heats', function (Blueprint $table) {
            $table->id();
            $table->string('number', 50)->nullable();
            $table->string('title', 200)->nullable();
            $table->date('date')->nullable()->nullable();
            $table->string('filename', 200)->nullable();
            $table->string('printed', 50)->nullable();
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
        Schema::dropIfExists('heats');
    }
};
