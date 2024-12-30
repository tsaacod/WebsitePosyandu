<title>{{ $title }}</title>
<x-layout>
    <div class="container mx-auto p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class="font-bold text-xl mt-2">Edit Perkembangan Bayi</h1>
        </div>

        <form action="{{ route('perkembanganbayi.update', $perkembangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-4">

                <label for="bayi_id" class="block text-lg font-semibold text-[#205937]">Bayi</label>
                <select name="bayi_id" id="bayi_id" class="form-control w-full p-3 rounded-md border border-gray-300" required>
                    @foreach ($bayi as $bayiData)
                        <option value="{{ $bayiData->id }}" 
                            {{ $bayiData->id == $perkembangan->bayi_id ? 'selected' : '' }}>
                            {{ $bayiData->nama_bayi }}

                <label for="id_bayi" class="block text-lg font-semibold text-[#205937]">ID Bayi</label>
                <select name="id_bayi" id="id_bayi" class="form-control w-full p-3 rounded-md border border-gray-300" required>
                    @foreach ($bayi as $bayiData)
                        <option value="{{ $bayiData->id }}" 
                            {{ $bayiData->id == $perkembangan->id_bayi ? 'selected' : '' }}>
                            {{ $bayiData->nama_bayi }} ({{ $bayiData->namaIbu }}, {{ $bayiData->namaAyah }})

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="Bulan" class="block text-lg font-semibold text-[#205937]">Bulan</label>
                <input type="date" name="Bulan" value="{{ $perkembangan->Bulan }}" class="form-control w-full p-3 rounded-md border border-gray-300" required>
            </div>

            <div class="form-group mb-4">
                <label for="BeratBadan" class="block text-lg font-semibold text-[#205937]">Berat Badan (kg)</label>
                <input type="number" step="0.1" name="BeratBadan" value="{{ $perkembangan->BeratBadan }}" class="form-control w-full p-3 rounded-md border border-gray-300" required>
            </div>

            <div class="form-group mb-6">
                <label for="TinggiBadan" class="block text-lg font-semibold text-[#205937]">Tinggi Badan (cm)</label>
                <input type="number" step="0.1" name="TinggiBadan" value="{{ $perkembangan->TinggiBadan }}" class="form-control w-full p-3 rounded-md border border-gray-300" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-[#297F4C] text-white px-6 py-2 rounded-md hover:scale-105 transition-all">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>
