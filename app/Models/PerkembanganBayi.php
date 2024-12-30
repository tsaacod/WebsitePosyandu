<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganBayi extends Model
{
    use HasFactory;

    protected $table = 'perkembanganbayi';

    protected $fillable = [
        'id_bayi',
        'Bulan',
        'BeratBadan',
        'TinggiBadan',
    ];

    public function bayi()
    {
        return $this->belongsTo(Bayi::class, 'id_bayi', 'id');
    }
}
