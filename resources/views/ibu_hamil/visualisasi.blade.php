<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="text-center">
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
            </div>
        </div>
    </x-slot:title>

    <div class="container mx-auto mt-6 text-center">
        <h2 class="text-3xl font-semibold mb-4">Visualisasi Data Kehamilan</h2>
        <div class="flex justify-around">
            <!-- Chart untuk Jumlah Ibu Hamil per Kehamilan -->
            <div class="chart-container border border-gray-300 rounded-lg p-4 bg-white shadow-md" style="width: 45%; max-width: 500px;">
                <canvas id="kehamilanChart"></canvas>
            </div>

            <!-- Chart untuk Distribusi Usia Ibu Hamil -->
            <div class="chart-container border border-blue-300 rounded-lg p-4 bg-white shadow-md" style="width: 45%; max-width: 500px;">
                <canvas id="usiaChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Pie Chart
        const kehamilanData = @json($kehamilanKeCounts);
        const labelsKehamilan = Object.keys(kehamilanData);
        const dataKehamilan = Object.values(kehamilanData);

        // Hitung total untuk presentase
        const totalKehamilan = dataKehamilan.reduce((acc, val) => acc + val, 0);

        const ctxKehamilan = document.getElementById('kehamilanChart').getContext('2d');
        const kehamilanChart = new Chart(ctxKehamilan, {
            type: 'pie',
            data: {
                labels: labelsKehamilan,
                datasets: [{
                    label: 'Jumlah Ibu Hamil per Kehamilan Ke',
                    data: dataKehamilan,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Ibu Hamil per Kehamilan'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const percentage = ((value / totalKehamilan) * 100).toFixed(2); // Hitung presentase
                                return `${label}: ${value} Jumlah Kehamilan (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Data untuk Bar Chart
        const usiaData = @json($usiaCounts);
        const labelsUsia = Object.keys(usiaData);
        const dataUsia = Object.values(usiaData);

        const ctxUsia = document.getElementById('usiaChart').getContext('2d');
        const usiaChart = new Chart(ctxUsia, {
            type: 'bar',
            data: {
                labels: labelsUsia,
                datasets: [{
                    label: 'Jumlah Ibu Hamil Berdasarkan Usia',
                    data: dataUsia,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true ,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Usia Ibu Hamil'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Usia Ibu Hamil' // Keterangan utk sumbu X
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Ibu Hamil' // Keterangan utk sumbu Y
                        }
                    }
                }
            }
        });
    </script>
</x-layout>