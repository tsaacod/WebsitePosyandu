<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="text-center text-2xl text-[#205937] mb-6">
            {{ $title }}
            <h1 class="font-bold text-lg">Posyandu Sakura RW 08</h1>
        </div>
    </x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('ibu-hamil.update', $ibuHamil->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="Nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="Nama" 
                    name="Nama" 
                    value="{{ old('Nama', $ibuHamil->Nama) }}"
                    placeholder="Masukkan nama ibu" 
                    required>
                @error('Nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="TanggalLahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                <input 
                    type="date" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="TanggalLahir" 
                    name="TanggalLahir" 
                    value="{{ old('TanggalLahir', $ibuHamil->TanggalLahir) }}" 
                    required>
                @error('TanggalLahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="NoTelepon" class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="NoTelepon" 
                    name="NoTelepon" 
                    value="{{ old('NoTelepon', $ibuHamil->NoTelepon) }}"
                    placeholder="Masukkan nomor telepon" 
                    required>
                @error('NoTelepon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input 
                    type="text" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="Alamat" 
                    name="Alamat" 
                    value="{{ old('Alamat', $ibuHamil->Alamat) }}"
                    placeholder="Masukkan alamat" 
                    required>
                @error('Alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kehamilan_ke" class="block text-sm font-medium text-gray-700 mb-1">Kehamilan Ke</label>
                <input 
                    type="number" 
                    class="form-control w-full border-gray-300 rounded-md shadow-sm focus:ring-[#205937] focus:border-[#205937]" 
                    id="kehamilan_ke" 
                    name="kehamilan_ke" 
                    value="{{ old('kehamilan_ke', $ibuHamil->kehamilan_ke) }}"
                    placeholder="Masukkan kehamilan ke" 
                    required>
                @error('kehamilan_ke')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('ibu-hamil.index') }}" class="btn btn-secondary text-[#205937] border border-[#205937] px-4 py-2 rounded-md hover:bg-[#205937] hover:text-white">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success bg-[#205937] text-white px-4 py-2 rounded-md hover:bg-[#184d2f]">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layout>
