<?php

namespace App\Http\Controllers;

use App\Models\bayi;
use Illuminate\Http\Request;

class bayiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visdatGender = Bayi::select('jenisKelamin')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('jenisKelamin')
            ->pluck('count', 'jenisKelamin');

        $jenisKelamin = $visdatGender->keys(); 
        $counts = $visdatGender->values();   
    
        $bayi = Bayi::all();

        return view('bayi.index', [
            'title' => 'Daftar Bayi',
            'bayi' => $bayi,
            'jenisKelamin' => $jenisKelamin,
            'counts' => $counts  
        ]);
    }


    // Liat detail bayi
    public function showDetail(string $id)
    {
        $bayi = Bayi::findOrFail($id);

        return view('bayi.showDetail', [
            'bayi' => $bayi,
            'title' => 'Detail Bayi',
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('bayi.create',[
        'title' => 'Tambahkan Data Bayi'
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggalLahir' => 'required|date',
            'namaIbu' => 'required|string|max:255',
            'namaAyah' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ]);

        Bayi::create($validatedData);
        return redirect()->route('bayi.index')->with('success', 'Data bayi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bayi = Bayi::findOrFail($id);
        return view('bayi.show', compact('bayi'), 
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $bayi = Bayi::findOrFail($id);
        return view('bayi.edit', [
            'bayi' => $bayi,
            'title' => 'Edit Data Bayi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bayi = Bayi::findOrFail($id);

        $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggalLahir' => 'required|date',
            'namaIbu' => 'required|string|max:255',
            'namaAyah' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ]);

        $bayi->update($request->all());
        return redirect()->route('bayi.index')->with('success', 'Data Bayi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bayi = Bayi::findOrFail($id);
        $bayi->delete();
        return redirect()->route('bayi.index')->with('success', 'Data Bayi berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); 
        $bayi = Bayi::where('nama_bayi', 'LIKE', '%' . $query . '%')
                    ->get();

        return view('bayi.index', [
            'title' => 'Daftar Bayi',
            'bayi' => $bayi,
            'query' => $query 
        ]);
    }



}
