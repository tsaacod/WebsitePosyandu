<title>{{ $title }}</title>
<x-layout>
    <div class="container mx-auto p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class="font-bold text-xl mt-2">Detail Perkembangan Bayi</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="mb-4">

                <strong class="text-lg text-[#205937]">ID Bayi:</strong>
                <span>{{ $perkembangan->id_bayi }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Nama Bayi:</strong>
                <span>{{ $perkembangan->bayi->nama_bayi }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Bulan:</strong>
                <span>{{ $perkembangan->Bulan }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Berat Badan:</strong>
                <span>{{ $perkembangan->BeratBadan }} kg</span>
            </div>

            <div class="mb-4">
                <strong class="text-lg text-[#205937]">Tinggi Badan:</strong>
                <span>{{ $perkembangan->TinggiBadan }} cm</span>
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('perkembanganbayi.index') }}">
                    <button class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-all">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-layout>
