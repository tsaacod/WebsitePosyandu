<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
            
            <div class="text-center">
                <i class="fas fa-edit text-[#297F4C] text-5xl mb-2"></i>
                <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
                <p class="text-xl mt-2">{{ $perkembangan->ibuHamil->Nama }}</p>
            </div>
            
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        </div>
    </x-slot:title>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6">
            <form action="{{ route('perkembangan-ibuhamil.update', $perkembangan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ibu Hamil Selection -->
                    <div>
                        <label for="id_ibuHamil" class="block text-sm font-medium text-gray-700 mb-1">Ibu Hamil</label>
                        <select id="id_ibuHamil" name="id_ibuHamil" class="w-full border border-gray-300 rounded-md px-4 py-2">
                            @foreach($ibuHamil as $ibu)
                                <option value="{{ $ibu->id }}" {{ $perkembangan->id_ibuHamil == $ibu->id ? 'selected' : '' }}>
                                    {{ $ibu->Nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_ibuHamil')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bulan Pemeriksaan -->
                    <div>
                        <label for="Bulan" class="block text-sm font-medium text-gray-700 mb-1">Bulan Pemeriksaan</label>
                        <input type="month" id="Bulan" name="Bulan" 
                               value="{{ old('Bulan', $perkembangan->Bulan->format('Y-m')) }}"
                               class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @error('Bulan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bulan Kehamilan -->
                    <div>
                        <label for="BulanKehamilan" class="block text-sm font-medium text-gray-700 mb-1">Bulan Kehamilan</label>
                        <input type="number" id="BulanKehamilan" name="BulanKehamilan" 
                               value="{{ old('BulanKehamilan', $perkembangan->BulanKehamilan) }}"
                               min="1" max="9"
                               class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @error('BulanKehamilan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Berat Badan -->
                    <div>
                        <label for="BeratBadan" class="block text-sm font-medium text-gray-700 mb-1">Berat Badan (kg)</label>
                        <input type="number" id="BeratBadan" name="BeratBadan" 
                               value="{{ old('BeratBadan', $perkembangan->BeratBadan) }}"
                               step="0.1"
                               class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @error('BeratBadan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lingkar Perut -->
                    <div>
                        <label for="LingkarPerut" class="block text-sm font-medium text-gray-700 mb-1">Lingkar Perut (cm)</label>
                        <input type="number" id="LingkarPerut" name="LingkarPerut" 
                               value="{{ old('LingkarPerut', $perkembangan->LingkarPerut) }}"
                               step="0.1"
                               class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @error('LingkarPerut')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tekanan Darah -->
                    <div>
                        <label for="TekananDarah" class="block text-sm font-medium text-gray-700 mb-1">Tekanan Darah (mmHg)</label>
                        <input type="number" id="TekananDarah" name="TekananDarah" 
                               value="{{ old('TekananDarah', $perkembangan->TekananDarah) }}"
                               class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @error('TekananDarah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('perkembangan-ibuhamil.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors duration-200">
                        Kembali
                    </a>
                    <button type="submit" 
                            class="bg-[#297F4C] text-white px-4 py-2 rounded-md hover:bg-[#205937] transition-colors duration-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>