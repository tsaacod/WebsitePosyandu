<title>{{ $title }}</title>
<x-layout>
    <div class="container mx-auto p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class="font-bold text-xl mt-2">Tambah Data Perkembangan Bayi</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <form action="{{ route('perkembanganbayi.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="id_bayi" class="text-lg text-[#205937]">ID Bayi</label>
                    <select name="id_bayi" id="id_bayi" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                        <option value="">Pilih Bayi</option>
                        @foreach ($bayi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_bayi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="Bulan" class="text-lg text-[#205937]">Bulan</label>
                    <input type="date" name="Bulan" id="Bulan" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="BeratBadan" class="text-lg text-[#205937]">Berat Badan (kg)</label>
                    <input type="number" step="0.1" name="BeratBadan" id="BeratBadan" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="TinggiBadan" class="text-lg text-[#205937]">Tinggi Badan (cm)</label>
                    <input type="number" step="0.1" name="TinggiBadan" id="TinggiBadan" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-[#297F4C] text-white px-6 py-2 rounded-md hover:bg-[#205937] transition-all">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
