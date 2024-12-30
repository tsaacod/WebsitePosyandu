<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            <div class="text-center">
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
            </div>
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <div class="mt-4 mb-6 flex space-x-4">
        <a href="{{ route('imunisasi.create') }}" class="inline-block">
            <button class="bg-gray-200 text-black px-4 py-2 rounded-md hover:bg-gray-300 transition">Tambah Data</button>
        </a>
        <a href="{{ route('imunisasi.visual') }}" class="inline-block">
            <button class="bg-gray-200 text-black px-4 py-2 rounded-md hover:bg-gray-300 transition">Visualisasi Data</button>
        </a>
    </div>

    <div class="mb-6 mt-4">
        <input type="text" id="search" placeholder="Cari Data Imunisasi..." class="border border-gray-300 rounded-md px-4 py-2 w-full" onkeyup="searchTable()">
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300 mt-3 rounded-lg shadow-sm overflow-hidden">
        <thead>
            <tr class="bg-[#205937] text-white">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Bayi</th>
                <th class="border border-gray-300 px-4 py-2">Jenis Imunisasi</th>
                <th class="border border-gray-300 px-4 py-2">Tanggal Imunisasi</th>
                <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="imunisasiTable">
            @foreach ($imunisasi as $data)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->bayi->nama_bayi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->jenis_imunisasi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->tanggal_imunisasi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->keterangan }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('imunisasi.show', $data->id) }}">
                            <button class="bg-gray-200 text-black rounded-md px-3 py-1">
                                Lihat
                            </button>
                        </a>
                        <a href="{{ route('imunisasi.edit', $data->id) }}">
                            <button class="bg-gray-200 text-black rounded-md px-3 py-1">
                                Edit
                            </button>
                        </a>
                        <form action="{{ route('imunisasi.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-200 text-black rounded-md px-3 py-1">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

<script>
    function searchTable() {
        const input = document.getElementById("search");
        const filter = input.value.toLowerCase();
        const table = document.getElementById("imunisasiTable");
        const tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName("td");
            let found = false;
            for (let j = 1; j < td.length; j++) {
                if (td[j]) {
                    const txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
            }
            tr[i].style.display = found ? "" : "none";
        }
    }
</script>
