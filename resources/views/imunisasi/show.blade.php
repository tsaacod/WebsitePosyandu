<title>{{ $title }}</title>
<x-layout>
    <div class="container mx-auto p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class="font-bold text-xl mt-2">Detail Imunisasi Bayi</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Nama Bayi:</strong>
                <span>{{ $imunisasi->bayi->nama_bayi }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Jenis Imunisasi:</strong>
                <span>{{ $imunisasi->jenis_imunisasi }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Tanggal Imunisasi:</strong>
                <span>{{ $imunisasi->tanggal_imunisasi }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Keterangan:</strong>
                <span>{{ $imunisasi->keterangan }}</span>
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('imunisasi.index') }}">
                    <button class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-all">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-layout>
