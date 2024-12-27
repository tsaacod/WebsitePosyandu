<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="text-center text-2xl text-[#205937] mb-6">
            {{ $title }}
            <h1 class="font-bold text-lg">Posyandu Sakura RW 08</h1>
        </div>
    </x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('bayi.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_bayi" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="nama_bayi" 
                    name="nama_bayi" 
                    placeholder="Masukkan nama bayi" 
                    required>
            </div>

            <div class="mb-4">
                <label for="jenisKelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select 
                    id="jenisKelamin" 
                    name="jenisKelamin" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    required>
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="tanggalLahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                <input 
                    type="date" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="tanggalLahir" 
                    name="tanggalLahir" 
                    required>
            </div>

            <div class="mb-4">
                <label for="namaIbu" class="block text-sm font-medium text-gray-700 mb-1">Nama Ibu</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="namaIbu" 
                    name="namaIbu" 
                    placeholder="Masukkan nama ibu bayi" 
                    required>
            </div>

            <div class="mb-4">
                <label for="namaAyah" class="block text-sm font-medium text-gray-700 mb-1">Nama Ayah</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="namaAyah" 
                    name="namaAyah" 
                    placeholder="Masukkan nama ayah bayi" 
                    required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="alamat" 
                    name="alamat" 
                    rows="3" 
                    placeholder="Masukkan alamat bayi" 
                    required></textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('bayi.index') }}" class="btn btn-secondary text-[#205937] border border-[#205937] px-4 py-2 rounded-md hover:bg-[#205937] hover:text-white">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success bg-[#205937] text-white px-4 py-2 rounded-md hover:bg-[#184d2f]">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>
