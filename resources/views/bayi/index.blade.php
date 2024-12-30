<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class='header-image text-center text-2xl text-[#205937]'>
            {{ $title }}
            <h1 class='font-bold'>Posyandu Sakura RW 08</h1>
        </div>
    </x-slot:title>

    <!-- Visualisasi Data -->
    <div style="text-align: center;">
        <h2 class="font-bold">Persentase Jenis Kelamin Bayi</h2>
    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
        <canvas id="JenisKelamin" width="250" height="250"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($jenisKelamin);
        const data = @json($counts);

        const ctx = document.getElementById('JenisKelamin').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Bayi',
                    data: data,
                    backgroundColor: [
                        'rgba(65, 176, 110, 0.6)', // Warna hijau cerah
                        'rgba(41, 127, 76, 0.6)'  // Warna hijau tua
                    ],
                    borderColor: [
                        'rgba(65, 176, 110, 1)',
                        'rgba(41, 127, 76, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

    <!-- Tombol Tambah -->
    <div class="relative group inline-block mb-4">
        <a href="{{ route('bayi.create') }}" class='inline-block'>
            <button class="btn-tambah-bayi bg-[#297F4C] text-white px-4 py-2 flex items-center space-x-4 hover:scale-110 transition-transform rounded-md">
                <span>Tambah Bayi</span>
            </button>
        </a>
    </div>

    <!-- Search Bar -->
    <div>
        <input 
            type="text" 
            id="search" 
            placeholder="🔍 Quick Search..." 
            class="border border-gray-300 rounded-md px-4 py-2 w-full mb-4" 
            onkeyup="searchTable()">
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById("search");
            const filter = input.value.toLowerCase();
            const table = document.getElementById("bayitable");
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
        <tbody id="bayitable">
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
