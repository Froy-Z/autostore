<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('car_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('car_body_id')->references('id')->on('car_bodies');
        });
    }
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['car_body_id']);
            $table->dropColumn('car_body_id');
        });

        Schema::dropIfExists('car_bodies');
    }
};
