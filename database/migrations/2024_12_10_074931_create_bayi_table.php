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
        Schema::create('bayi', function (Blueprint $table) {
            $table->id();
            $table->date('bulan');
            $table->date('tanggalLahir');
            $table->string('namaIbu');
            $table->string('namaAyah');
            $table->string('alamat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayi');
    }
};