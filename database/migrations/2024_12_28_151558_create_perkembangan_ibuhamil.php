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
        Schema::create('perkembangan_ibuhamil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ibuHamil');
            $table->date('Bulan');
            $table->integer('BulanKehamilan');
            $table->float('BeratBadan');
            $table->float('LingkarPerut');
            $table->float('TekananDarah');
            $table->timestamps();

            $table->foreign('id_ibuHamil')->references('id')->on('ibu_hamil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkembangan_ibuhamil');
    }
};
