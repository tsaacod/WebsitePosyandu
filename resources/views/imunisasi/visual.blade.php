<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            <div class="text-center">
                <i class="fas fa-syringe text-[#297F4C] text-5xl mb-2"></i>
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
            </div>
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <div class="container">
        <h2 class="text-center">Visualisasi Jumlah Imunisasi per Bulan</h2>
        <canvas id="imunisasiChart"></canvas>
    </div>

    <div class="flex justify-center mt-6">
        <a href="{{ route('imunisasi.index') }}">
            <button class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-all">
                Kembali
            </button>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('imunisasiChart').getContext('2d');
        
        var imunisasiChart = new Chart(ctx, {
            type: 'line', // Bisa diganti dengan 'bar' untuk bar chart
            data: {
                labels: @json($bulan), // Label bulan
                datasets: [{
                    label: 'Jumlah Imunisasi',
                    data: @json($jumlah), // Data jumlah imunisasi
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-layout>
