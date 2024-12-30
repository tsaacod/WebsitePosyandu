<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Bayi;
use App\Models\Imunisasi;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $imunisasi = Imunisasi::with('bayi')->get();
        return view('imunisasi.index', [
            'title' => 'Data Imunisasi',
            'imunisasi' => $imunisasi
        ]);
    }

    public function visualisasi()
    {
        $title = 'Visualisasi Perkembangan Bayi';
        // Mengambil data jumlah imunisasi per bulan
        $imunisasiPerBulan = Imunisasi::selectRaw('COUNT(*) as jumlah, MONTH(tanggal_imunisasi) as bulan, YEAR(tanggal_imunisasi) as tahun')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();


        // Mengubah data menjadi array agar mudah digunakan di frontend
        $bulan = [];
        $jumlah = [];
        foreach ($imunisasiPerBulan as $data) {
            $bulan[] = Carbon::createFromFormat('m', $data->bulan)->format('F Y'); // Format bulan dan tahun
            $jumlah[] = $data->jumlah;
        }

        return view('imunisasi.visual', compact('bulan', 'jumlah', 'title'));
    }

    public function create()
    {
        $bayi = Bayi::all();
        return view('imunisasi.create', [
            'title' => 'Tambah Imunisasi',
            'bayi' => $bayi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bayi_id' => 'required|exists:bayi,id',
            'jenis_imunisasi' => 'required|string|max:255',
            'tanggal_imunisasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Imunisasi::create($request->all());

        return redirect()->route('imunisasi.index')->with('success', 'Imunisasi berhasil ditambahkan.');
    }

    public function edit(Imunisasi $imunisasi)
    {
        $bayi = Bayi::all();
        return view('imunisasi.edit', [
            'title' => 'Edit Imunisasi',
            'imunisasi' => $imunisasi,
            'bayi' => $bayi
        ]);
    }

    public function update(Request $request, Imunisasi $imunisasi)
    {
        $request->validate([
            'bayi_id' => 'required|exists:bayi,id',
            'jenis_imunisasi' => 'required|string|max:255',
            'tanggal_imunisasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $imunisasi->update($request->all());

        return redirect()->route('imunisasi.index')->with('success', 'Imunisasi berhasil diperbarui.');
    }

    public function show(Imunisasi $imunisasi)
    {
        return view('imunisasi.show', [
            'title' => 'Detail Imunisasi',
            'imunisasi' => $imunisasi
        ]);
    }

    public function destroy(Imunisasi $imunisasi)
    {
        $imunisasi->delete();
        return redirect()->route('imunisasi.index')->with('success', 'Imunisasi berhasil dihapus.');
    }
}
