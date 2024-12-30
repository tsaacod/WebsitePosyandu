<x-layout>
    <x-slot:title>
        <div class="text-center text-2xl text-[#205937]">
            Detail Bayi: {{ $bayi->nama_bayi }}
        </div>
    </x-slot:title>

    <!-- Perkembangan Berat Badan -->
    <div class="bg-[#d9f4e3] p-6 rounded-lg shadow-md mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-[#205937]">Perkembangan Berat Badan Bayi</h2>
            <div class="flex space-x-4">
                <!-- Tombol Tambah -->
                <a href="{{ route('perkembanganbayi.create') }}" class="bg-[#297F4C] p-3 rounded-full hover:bg-[#205937] transition">
                    <i class="fas fa-plus text-white text-lg"></i>
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('perkembanganbayi.index') }}" class="bg-[#297F4C] p-3 rounded-full hover:bg-[#205937] transition">
                    <i class="fas fa-edit text-white text-lg"></i>
                </a>
            </div>
        </div>

        <div class="relative">
            <canvas id="grafikBeratBadan" class="w-full h-64"></canvas>
        </div>
    </div>

    <!-- Tabel Perkembangan Bayi -->
    <h2 class="mt-6 text-lg font-semibold text-[#205937]">Perkembangan Bayi</h2>
    <table class="table-auto w-full border-collapse border border-gray-300 mt-3 rounded-lg shadow-sm">
        <thead>
            <tr class="bg-[#205937] text-white">
                <th class="border border-gray-300 px-4 py-2">Bulan</th>
                <th class="border border-gray-300 px-4 py-2">Berat Badan</th>
                <th class="border border-gray-300 px-4 py-2">Tinggi Badan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($perkembangan as $item)
                <tr class="hover:bg-gray-50 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($item->Bulan)->format('F Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->BeratBadan }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->TinggiBadan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-2">Tidak ada data perkembangan bayi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <!-- Imunisasi Section -->
    <div class="bg-[#f9fef7] p-6 rounded-lg shadow-md mt-6">
        <div class="flex justify-between items-center mb-6">
            <!-- Tombol Tambah -->
            <a href="{{ route('imunisasi.create') }}" class="bg-[#297F4C] p-3 rounded-full hover:bg-[#205937] transition">
                <i class="fas fa-plus text-white text-lg"></i>
            </a>
        </div>

        <!-- Tabel Progress Imunisasi -->
        <table class="table-auto w-full text-left bg-[#fffde9] border-collapse border border-[#e3e3e3] rounded-lg">
            <thead>
                <tr class="text-[#205937]">
                    <th class="px-4 py-2 border border-[#e3e3e3] rounded-tl-lg">No</th>
                    <th class="px-4 py-2 border border-[#e3e3e3]">Jenis Imunisasi</th>
                    <th class="px-4 py-2 border border-[#e3e3e3]">Tanggal Imunisasi</th>
                    <th class="px-4 py-2 border border-[#e3e3e3]">Hasil Imunisasi</th>
                    <th class="px-4 py-2 border border-[#e3e3e3] rounded-tr-lg">Kontrol</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($imunisasi as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->jenis_imunisasi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_imunisasi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->keterangan }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="h-4 w-4 text-green-500">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-4 py-2">Belum ada data imunisasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikBeratBadan').getContext('2d');
        const chartData = {
            labels: @json($perkembangan->pluck('Bulan')->map(fn($bulan) => \Carbon\Carbon::parse($bulan)->format('F'))),
            datasets: [{
                label: 'Berat badan (Kg)',
                data: @json($perkembangan->pluck('BeratBadan')),
                borderColor: '#205937',
                backgroundColor: 'rgba(32, 89, 55, 0.2)',
                borderWidth: 2,
            }]
        };

        const myChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Berat badan (Kg)'
                        }
                    }
                }
            }
        });
    </script>
</x-layout>
