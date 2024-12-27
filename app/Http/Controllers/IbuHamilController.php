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
    // Menampilkan daftar ibu hamil beserta bayinya
    $ibuHamil = Ibuhamil::with('bayi')->get(); // Ambil semua data ibu hamil beserta relasi bayi
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
            'Nama' => 'required',
            'TanggalLahir' => 'required',
            'NoTelepon' => 'required',
            'Alamat' => 'required',
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
        // Menampilkan detail ibu hamil beserta bayinya
        $ibuHamil->load('bayi'); // Muat relasi bayi
        $nav = 'Detail Ibu Hamil - ' . $ibuHamil->Nama;
        return view('ibu_hamil.show', compact('ibuHamil', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ibuhamil $ibuHamil)
    {
        // Menampilkan form untuk mengedit data ibu hamil
        $nav = 'Edit Ibu Hamil - ' . $ibuHamil->Nama;
        return view('ibu_hamil.edit', compact('ibuHamil', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'Nama' => 'required',
            'TanggalLahir' => 'required',
            'NoTelepon' => 'required',
            'Alamat' => 'require',
        ]);

        // Temukan ibu hamil berdasarkan ID
        $ibuHamil = Ibuhamil::findOrFail($id);

        // Update data ibu hamil
        $ibuHamil->update($request->all());

        return redirect()->route('ibu-hamil.index')->with('success', 'Data Ibu Hamil berhasil diperbarui.');
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
