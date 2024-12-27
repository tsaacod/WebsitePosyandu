<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayi extends Model
{
    use HasFactory;

    protected $table = 'bayi';
    protected $fillable = [
        'nama_bayi',
        'jenisKelamin',
        'tanggalLahir',
        'namaIbu',
        'namaAyah',
        'alamat',

    ];

}
