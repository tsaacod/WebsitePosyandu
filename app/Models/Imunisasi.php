<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $table = 'imunisasi';
    protected $fillable = ['bayi_id', 'jenis_imunisasi', 'tanggal_imunisasi', 'keterangan'];

    public function bayi()
    {
        return $this->belongsTo(Bayi::class);
    }
}