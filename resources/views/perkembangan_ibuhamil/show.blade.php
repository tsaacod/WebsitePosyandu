<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            
            <div class="text-center">
                <i class="fas fa-chart-line text-[#297F4C] text-5xl mb-2"></i>
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <p class="text-xl mt-2">{{ $perkembangan->ibuHamil->Nama }}</p>
            </div>
            
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <!-- Grafik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Grafik Berat Badan -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-4">Perkembangan Berat Badan</h3>
            <canvas id="weightChart"></canvas>
        </div>

        <!-- Grafik Lingkar Perut -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-4">Perkembangan Lingkar Perut</h3>
            <canvas id="waistChart"></canvas>
        </div>
    </div>

    <!-- Detail Data -->
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h3 class="text-xl font-semibold mb-4">Detail Perkembangan</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <p class="text-gray-600">Bulan Pemeriksaan</p>
                <p class="font-semibold">{{ $perkembangan->Bulan->format('F Y') }}</p>
            </div>
            <div>
                <p class="text-gray-600">Bulan Kehamilan</p>
                <p class="font-semibold">{{ $perkembangan->BulanKehamilan}}</p>
            </div>
            <div>
                <p class="text-gray-600">Berat Badan</p>
                <p class="font-semibold">{{ $perkembangan->BeratBadan }} kg</p>
            </div>
            <div>
                <p class="text-gray-600">Lingkar Perut</p>
                <p class="font-semibold">{{ $perkembangan->LingkarPerut }} cm</p>
            </div>
            <div>
                <p class="text-gray-600">Tekanan Darah</p>
                <p class="font-semibold">{{ $perkembangan->TekananDarah }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('perkembangan-ibuhamil.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            Kembali
        </a>
    </div>

    <!-- Tambahkan Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Berat Badan
        const weightLabels = @json($historicalData->pluck('BulanKehamilan'));
        const weightData = @json($historicalData->pluck('BeratBadan'));

        const weightChart = new Chart(document.getElementById('weightChart'), {
            type: 'line',
            data: {
                labels: weightLabels,
                datasets: [{
                    label: 'Berat Badan (kg)',
                    data: weightData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data untuk Lingkar Perut
        const waistData = @json($historicalData->pluck('LingkarPerut'));

        const waistChart = new Chart(document.getElementById('waistChart'), {
            type: 'line',
            data: {
                labels: weightLabels,
                datasets: [{
                    label: 'Lingkar Perut (cm)',
                    data: waistData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-layout>
