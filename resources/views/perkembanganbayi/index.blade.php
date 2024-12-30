<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <!-- Garis dekoratif atas -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            
            <div class="text-center">
                <!-- Ikon Perkembangan Bayi -->
                <i class="fas fa-baby text-[#297F4C] text-5xl mb-2"></i>
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
            </div>
            
            <!-- Garis dekoratif bawah -->
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <!-- Tombol tambah -->
    <div class="relative group inline-block mb-4">
        <a href="{{ route('perkembanganbayi.create') }}" class='inline-block'>
            <button class="bg-[#297F4C] text-white px-4 py-2 flex items-center space-x-4 hover:scale-110 transition-transform rounded-md">
                <i class="fas fa-plus text-xl"></i>
                <span>Tambah Data</span>
            </button>
        </a>
    </div>

    <!-- Pencarian -->
    <div class="mb-6 mt-4">
        <input type="text" id="search" placeholder="Cari Perkembangan Bayi..." class="border border-gray-300 rounded-md px-4 py-2 w-full" onkeyup="searchTable()">
    </div>

    <!-- Tabel Perkembangan Bayi -->
    <table class="table-auto w-full border-collapse border border-gray-300 mt-3 rounded-lg shadow-sm overflow-hidden">
        <thead>
            <tr class="bg-[#205937] text-white">
                <th class="border border-gray-300 px-4 py-2 rounded-tl-lg">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Bayi</th>
                <th class="border border-gray-300 px-4 py-2">Bulan</th>
                <th class="border border-gray-300 px-4 py-2">Berat Badan</th>
                <th class="border border-gray-300 px-4 py-2">Tinggi Badan</th>
                <th class="border border-gray-300 px-4 py-2 rounded-tr-lg">Aksi</th>
            </tr>
        </thead>
        <tbody id="perkembanganBayiTable">
            @foreach ($perkembangan as $data)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->bayi ? $data->bayi->nama_bayi : 'Nama Tidak Ditemukan' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->Bulan }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->BeratBadan }} kg</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $data->TinggiBadan }} cm</td>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                        <a href="{{ route('perkembanganbayi.show', $data->id) }}">
                            <button class="bg-blue-500 text-white rounded-md px-3 py-1 hover:bg-blue-600 transition duration-200">
                                Lihat
                            </button>
                        </a>
                        <a href="{{ route('perkembanganbayi.edit', $data->id) }}">
                            <button class="bg-yellow-500 text-white rounded-md px-3 py-1 hover:bg-yellow-600 transition duration-200">
                                Edit
                            </button>
                        </a>
                        <form action="{{ route('perkembanganbayi.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded-md px-3 py-1 hover:bg-red-600 transition duration-200">
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
        const table = document.getElementById("perkembanganBayiTable");
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
