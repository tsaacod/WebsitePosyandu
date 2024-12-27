<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class='text-center text-2xl text-[#205937]'>
            {{ $title }}
            <h1 class='font-bold'>Posyandu Sakura RW 08</h1>
        </div>
    </x-slot:title>

    <!-- Tombol tambah -->
    <div class="relative group inline-block">
        <a href="{{ route('bayi.create') }}" class='inline-block'>
            <img src="{{ asset('img/add.png') }}" alt="add" class="w-10 h-10 cursor-pointer">
        </a>
        <span class="absolute left-1/2 -translate-x-1/2 bottom-14 bg-[#297F4C] text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Tambah
        </span>
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
