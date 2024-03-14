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
        Schema::create('car_engines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('car_engine_id')->references('id')->on('car_engines');
        });
    }
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['car_engine_id']);
            $table->dropColumn('car_engine_id');
        });
        Schema::dropIfExists('car_engines');
    }
};
