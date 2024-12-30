<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganBayi;
use Illuminate\Http\Request;
use App\Models\Bayi;

class PerkembanganBayiController extends Controller
{
    public function index()
    {
        $perkembangan = PerkembanganBayi::all();  // Or other logic if needed
    $labels = [];  // Populate with month names
    $values = [];  // Populate with values related to data

    return view('perkembanganbayi.index', [
        'perkembangan' => $perkembangan,  // Pass perkembangan
        'labels' => $labels,  // Pass labels
        'values' => $values,  // Pass values
        'title' => 'Perkembangan Berat Badan Bayi'
    ]);
    }



    public function create()
    {
        $title = 'Create Perkembangan Bayi';  // Set the title here
        $bayi = Bayi::all(); // Mengambil semua data bayi
        return view('perkembanganbayi.create', compact('title', 'bayi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bayi' => 'required|integer',
            'Bulan' => 'required|date',
            'BeratBadan' => 'required|numeric',
            'TinggiBadan' => 'required|numeric',
        ]);

        PerkembanganBayi::create($request->all());
        return redirect()->route('perkembanganbayi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $perkembangan = PerkembanganBayi::findOrFail($id);  // Fetch the data based on the ID
        $title = 'Detail Perkembangan Bayi';  // Set the title here
        return view('perkembanganbayi.show', compact('perkembangan', 'title'));  // Send both variables to the view
    }



    public function edit($id)
    {
        $title = 'Edit Perkembangan Bayi';  // Set the title here
        $perkembangan = PerkembanganBayi::findOrFail($id);
        $bayi = Bayi::all(); // Ambil semua data bayi untuk dropdown
        return view('perkembanganbayi.edit', compact('perkembangan', 'bayi', 'title')); // Pastikan variabel dikirim
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_bayi' => 'required|integer',
            'Bulan' => 'required|date',
            'BeratBadan' => 'required|numeric',
            'TinggiBadan' => 'required|numeric',
        ]);

        $data = PerkembanganBayi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('perkembanganbayi.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $data = PerkembanganBayi::findOrFail($id);
        $data->delete();
        return redirect()->route('perkembanganbayi.index')->with('success', 'Data berhasil dihapus.');
    }
}

