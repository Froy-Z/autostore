<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('image_id')
                ->nullable()
                ->after('body')
                ->references('id')
                ->on('images')
                ->nullOnDelete();
        });
    }
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('image')->nullable();
            $table->dropColumn('image_id');
        });
    }
};
