<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerkembanganIbuHamil extends Model
{

    protected $table = 'perkembangan_ibuhamil';
    protected $fillable = [
        'id_ibuHamil',
        'Bulan',
        'BulanKehamilan',
        'BeratBadan',
        'LingkarPerut',
        'TekananDarah'
    ];

    protected $casts = [
        'Bulan' => 'date',
        'BulanKehamilan' => 'integer',
        'BeratBadan' => 'float',
        'LingkarPerut' => 'float',
        'TekananDarah' => 'float'
    ];

    public function ibuHamil()
    {
        return $this->belongsTo(IbuHamil::class, 'id_ibuHamil');
    }
}
