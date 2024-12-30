<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            <div class="text-center">
                <i class="fas fa-edit text-[#297F4C] text-5xl mb-2"></i>
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
            </div>
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <form action="{{ route('imunisasi.update', $imunisasi->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="bayi_id" class="block text-gray-700">Nama Bayi</label>
            <select name="bayi_id" id="bayi_id" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                @foreach ($bayi as $b)
                    <option value="{{ $b->id }}" {{ $imunisasi->bayi_id == $b->id ? 'selected' : '' }}>{{ $b->nama_bayi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="jenis_imunisasi" class="block text-gray-700">Jenis Imunisasi</label>
            <input type="text" name="jenis_imunisasi" id="jenis_imunisasi" class="border border-gray-300 rounded-md px-4 py-2 w-full" value="{{ $imunisasi->jenis_imunisasi }}">
        </div>
        <div class="mb-4">
            <label for="tanggal_imunisasi" class="block text-gray-700">Tanggal Imunisasi</label>
            <input type="date" name="tanggal_imunisasi" id="tanggal_imunisasi" class="border border-gray-300 rounded-md px-4 py-2 w-full" value="{{ $imunisasi->tanggal_imunisasi }}">
        </div>
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="border border-gray-300 rounded-md px-4 py-2 w-full">{{ $imunisasi->keterangan }}</textarea>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-[#297F4C] text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-200">Update</button>
        </div>
    </form>
</x-layout>