<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayi;
use App\Models\IbuHamil;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBayi = Bayi::count();
        $jumlahIbuHamil = IbuHamil::count();

        return view('home', [
            'title' => 'Home',
            'jumlahBayi' => $jumlahBayi,
            'jumlahIbuHamil' => $jumlahIbuHamil,
        ]);

    }
}