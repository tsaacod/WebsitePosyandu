<?php

namespace App\Http\Controllers;

use App\Models\Ibuhamil;
use Illuminate\Http\Request;

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
    public function show(Ibuhamil $ibuHamil)
    {
        // Menampilkan detail ibu hamil
        $nav = 'Detail Ibu Hamil - ' . $ibuHamil->Nama;
        return view('ibu_hamil.show', compact('ibuHamil', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $ibuHamil = IbuHamil::findOrFail($id);
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
    $ibuHamil = IbuHamil::findOrFail($id);

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
     * Remove the specified resource from storage.
     */
    public function destroy(Ibuhamil $ibuHamil)
    {
        // Menghapus data ibu hamil
        $ibuHamil->delete();

        return redirect()->route('ibu-hamil.index')->with('success', 'Data Ibu Hamil berhasil dihapus.');
    }
}