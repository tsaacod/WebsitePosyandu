<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class='text-center text-2xl text-[#205937]'>
            {{ $title }}
            <h1 class='font-bold'>Posyandu Sakura RW 08</h1>
        </div>
    </x-slot:title>

    <!-- Tombol Tambah -->
    <div class="relative group inline-block mb-4">
        <a href="{{ route('bayi.create') }}" class='inline-block'>
            <button class="bg-[#297F4C] text-white px-4 py-2 flex items-center space-x-4 hover:scale-110 transition-transform rounded-md">
                <span>Tambah Bayi</span>
            </button>
        </a>
    </div>

    <!-- Search Bar -->
    <div>
        <form action="/search" method="GET" class="relative flex-1">
            <input 
                type="text" 
                name="query" 
                placeholder="Cari sesuatu..." 
                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#205937] focus:border-[#205937]">
            <button 
                type="submit" 
                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-[#205937]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.41-1.41l4.36 4.36a1 1 0 01-1.41 1.41l-4.36-4.36zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Table Bayi -->
    <table class="table-auto w-full border-collapse border border-gray-300 mt-3">
        <thead>
            <tr class="bg-[#205937] text-white">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Bayi</th>
                <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                <th class="border border-gray-300 px-4 py-2">Tanggal Lahir</th>
                <th class="border border-gray-300 px-4 py-2">Nama Ibu</th>
                <th class="border border-gray-300 px-4 py-2">Nama Ayah</th>
                <th class="border border-gray-300 px-4 py-2">Alamat</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bayi as $data)
                <tr class="hover:bg-gray-50 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->nama_bayi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->jenisKelamin }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->tanggalLahir }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->namaIbu }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->namaAyah }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->alamat }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('bayi.showDetail', $data->id) }}" class="inline-block">
                            <img src="{{ asset('img/view.png') }}" alt="view" class="w-6 h-6">
                        </a>
                        <a href="{{ route('bayi.edit', $data->id) }}" class="inline-block">
                            <img src="{{ asset('img/edit.png') }}" alt="edit" class="w-6 h-6">
                        </a>
                        <form action="{{ route('bayi.destroy', $data->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="{{ asset('img/delete.png') }}" alt="delete" class="w-6 h-6">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
