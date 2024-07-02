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
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('target_photo');
            $table->string('nama');
            $table->integer('target_tabungan');
            $table->string('per');
            $table->integer('jumlah_tabungan')->nullable()->default(0);
            $table->integer('jumlah_nabung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungans');
    }
};
