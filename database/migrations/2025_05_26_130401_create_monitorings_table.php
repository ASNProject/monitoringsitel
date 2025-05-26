<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('cel1');
            $table->string('cel2');
            $table->string('cel3');
            $table->string('cel4');
            $table->string('total');
            $table->string('current');
            $table->string('soc');
            $table->string('resistance');
            $table->string('temperature');
            $table->string('fuzzy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
