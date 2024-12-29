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
    Schema::table('ibu_hamil', function (Blueprint $table) {
        $table->integer('kehamilan_ke')->nullable()->after('alamat'); // Menambahkan kolom kehamilan_ke
    });
}

public function down()
{
    Schema::table('ibu_hamil', function (Blueprint $table) {
        $table->dropColumn('kehamilan_ke'); // Menghapus kolom saat rollback
    });
}

};
