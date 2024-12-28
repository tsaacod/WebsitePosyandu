<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerkembanganIbuHamilController extends Controller
{
    public function index()
    {
        return PerkembanganIbuhamil::with('ibuHamil')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ibuHamil' => 'required|exists:ibu_hamil,id',
            'Bulan' => 'required|date',
            'BulanKehamilan' => 'required|date',
            'BeratBadan' => 'required|numeric',
            'LingkarPerut' => 'required|numeric',
            'TekananDarah' => 'required|numeric',
        ]);

        return PerkembanganIbuhamil::create($validated);
    }

    public function show(PerkembanganIbuhamil $perkembanganIbuhamil)
    {
        return $perkembanganIbuhamil->load('ibuHamil');
    }

    public function update(Request $request, PerkembanganIbuhamil $perkembanganIbuhamil)
    {
        $validated = $request->validate([
            'id_ibuHamil' => 'exists:ibu_hamil,id',
            'Bulan' => 'date',
            'BulanKehamilan' => 'date',
            'BeratBadan' => 'numeric',
            'LingkarPerut' => 'numeric',
            'TekananDarah' => 'numeric',
        ]);

        $perkembanganIbuhamil->update($validated);
        return $perkembanganIbuhamil;
    }

    public function destroy(PerkembanganIbuhamil $perkembanganIbuhamil)
    {
        $perkembanganIbuhamil->delete();
        return response()->noContent();
    }
}
