<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganIbuHamil;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class PerkembanganIbuHamilController extends Controller
{
    public function index(Request $request)
    {
        $query = PerkembanganIbuHamil::with('ibuHamil');

        // Filter by ibu hamil
        if ($request->filled('ibu_hamil')) {
            $query->where('id_ibuHamil', $request->ibu_hamil);
        }

        // Filter by bulan pemeriksaan
        if ($request->filled('bulan')) {
            $query->whereMonth('Bulan', date('m', strtotime($request->bulan)))
                ->whereYear('Bulan', date('Y', strtotime($request->bulan)));
        }

        // Filter by bulan kehamilan
        if ($request->filled('bulan_kehamilan')) {
            $query->where('BulanKehamilan', $request->bulan_kehamilan);
        }

        $perkembangan = $query->orderBy('Bulan', 'desc')->get();
        $ibuHamil = IbuHamil::all();

        return view('perkembangan_ibuhamil.index', [
            'title' => 'Perkembangan Ibu Hamil',
            'perkembangan' => $perkembangan,
            'ibuHamil' => $ibuHamil
        ]);
    }

    public function show($id)
    {
        $perkembangan = PerkembanganIbuHamil::with('ibuHamil')->findOrFail($id);
        
        $historicalData = PerkembanganIbuHamil::where('id_ibuHamil', $perkembangan->id_ibuHamil)
            ->orderBy('BulanKehamilan')
            ->get();

        $maxBeratBadan = $historicalData->max('BeratBadan');
        $maxLingkarPerut = $historicalData->max('LingkarPerut');
            
        return view('perkembangan_ibuhamil.show', [
            'title' => 'Detail Perkembangan',
            'perkembangan' => $perkembangan,
            'historicalData' => $historicalData,
            'maxBeratBadan' => $maxBeratBadan,
            'maxLingkarPerut' => $maxLingkarPerut
        ]);
    }


    public function create()
    {
        $ibuHamil = IbuHamil::all();
        return view('perkembangan_ibuhamil.create', [
            'title' => 'Tambah Perkembangan',
            'ibuHamil' => $ibuHamil
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ibuHamil' => 'required|exists:ibu_hamil,id',
            'Bulan' => 'required|date',
            'BulanKehamilan' => 'required|numeric',
            'BeratBadan' => 'required|numeric',
            'LingkarPerut' => 'required|numeric',
            'TekananDarah' => 'required|numeric'
        ]);

        PerkembanganIbuHamil::create($validated);
        return redirect()->route('perkembangan-ibuhamil.index')
            ->with('success', 'Data perkembangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $perkembangan = PerkembanganIbuHamil::findOrFail($id);
        $ibuHamil = IbuHamil::all();
        
        return view('perkembangan_ibuhamil.edit', [
            'title' => 'Edit Perkembangan',
            'perkembangan' => $perkembangan,
            'ibuHamil' => $ibuHamil
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_ibuHamil' => 'required|exists:ibu_hamil,id',
            'Bulan' => 'required|date',
            'BulanKehamilan' => 'required|numeric',
            'BeratBadan' => 'required|numeric',
            'LingkarPerut' => 'required|numeric',
            'TekananDarah' => 'required|numeric'
        ]);

        $perkembangan = PerkembanganIbuHamil::findOrFail($id);
        $perkembangan->update($validated);

        return redirect()->route('perkembangan-ibuhamil.index')
            ->with('success', 'Data perkembangan berhasil diupdate');
    }

    public function destroy($id)
    {
        $perkembangan = PerkembanganIbuHamil::findOrFail($id);
        $perkembangan->delete();

        return redirect()->route('perkembangan-ibuhamil.index')
            ->with('success', 'Data perkembangan berhasil dihapus');
    }

    public function exportPdf()
    {
        // Retrieve the data
        $perkembangan = PerkembanganIbuHamil::with('ibuHamil')->orderBy('Bulan', 'desc')->get();

        // Generate PDF
        $pdf = PDF::loadView('perkembangan_ibuhamil.pdf', ['perkembangan' => $perkembangan])
            ->setPaper('a4', 'landscape');

        // Return PDF download
        return $pdf->download('Perkembangan_Ibu_Hamil.pdf');
    }

}