<?php
namespace App\Http\Controllers;

use App\Models\Ibuhamil;
use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan untuk mengimpor Carbon
use App\Models\PerkembanganIbuHamil;

class IbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar ibu hamil
        $ibuHamil = Ibuhamil::all(); // Ambil semua data ibu hamil
        $title = 'Daftar Ibu Hamil'; // Definisikan title
        return view('ibu_hamil.index', compact('ibuHamil', 'title')); // Kirim variabel ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambahkan ibu hamil baru
        return view('ibu_hamil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
            'TanggalLahir' => 'required|date',
            'NoTelepon' => 'required|string|max:15',
            'Alamat' => 'required|string|max:255',
            'kehamilan_ke' => 'required|integer',
        ]);

        // Menyimpan data ibu hamil baru ke database
        Ibuhamil::create($validatedData);

        return redirect()->route('ibu-hamil.index')->with('success', 'Data Ibu Hamil berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IbuHamil $ibuHamil)
    {
        $perkembangan = PerkembanganIbuHamil::where('id_ibuHamil', $ibuHamil->id)
            ->orderBy('Bulan', 'desc')
            ->get();
            
            return view('perkembangan_ibuhamil.index', [
                'title' => 'Detail Ibu Hamil - ' . $ibuHamil->Nama,
                'perkembangan' => $perkembangan,
                'ibuHamil' => $ibuHamil,
                'selectedIbuHamil' => $ibuHamil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ibuHamil = Ibuhamil::findOrFail($id);
        $title = 'Edit Ibu Hamil'; // Definisikan variabel title
        return view('ibu_hamil.edit', compact('ibuHamil', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'Nama' => 'required|string|max:255',
            'TanggalLahir' => 'required|date',
            'NoTelepon' => 'required|string|max:15',
            'Alamat' => 'required|string|max:255',
            'kehamilan_ke' => 'required|integer|min:1',
        ]);

        // Temukan data berdasarkan ID
        $ibuHamil = Ibuhamil::findOrFail($id);

        // Update data
        $ibuHamil->update([
            'Nama' => $request->Nama,
            'TanggalLahir' => $request->TanggalLahir,
            'NoTelepon' => $request->NoTelepon,
            'Alamat' => $request->Alamat,
            'kehamilan_ke' => $request->kehamilan_ke,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ibu-hamil.index')->with('success', 'Data ibu hamil berhasil diperbarui.');
    }

    /**
     * Visualisasi Data Kehamilan
     */
    public function visualisasi()
    {
        $ibuHamil = Ibuhamil::all();
        $kehamilanKeCounts = $ibuHamil->groupBy('kehamilan_ke')->map->count();
        $title = 'Visualisasi Data Kehamilan';

       // Hitung usia dan kelompokkan
$usiaCounts = [];
foreach ($ibuHamil as $ibu) {
    $usia = Carbon::parse($ibu->TanggalLahir)->age; // Hitung usia
    if ($usia < 17) {
        $usiaCounts['0-16'] = ($usiaCounts['0-16'] ?? 0) + 1; // Usia di bawah 17
    } elseif ($usia <= 20) {
        $usiaCounts['17-20'] = ($usiaCounts['17-20'] ?? 0) + 1; // Usia 17 hingga 20
    } elseif ($usia <= 25) {
        $usiaCounts['21-25'] = ($usiaCounts['21-25'] ?? 0) + 1; // Usia 21 hingga 25
    } elseif ($usia <= 30) {
        $usiaCounts['26-30'] = ($usiaCounts['26-30'] ?? 0) + 1; // Usia 26 hingga 30
    } elseif ($usia <= 35) {
        $usiaCounts['31-35'] = ($usiaCounts['31-35'] ?? 0) + 1; // Usia 31 hingga 35
    } elseif ($usia <= 40) {
        $usiaCounts['36-40'] = ($usiaCounts['36-40'] ?? 0) + 1; // Usia 36 hingga 40
    } else {
        $usiaCounts['41+'] = ($usiaCounts['41+'] ?? 0) + 1; // Usia di atas 40
    }
}
        return view('ibu_hamil.visualisasi', compact('kehamilanKeCounts', 'usiaCounts', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibuhamil $ibuHamil)
    {
        // Menghapus data ibu hamil
        $ibuHamil->delete();

        return redirect()->route('ibu-hamil.index')->with('success', 'Data Ibu Hamil berhasil dihapus.');
    }
}