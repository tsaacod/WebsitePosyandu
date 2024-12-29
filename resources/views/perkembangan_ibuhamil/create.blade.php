<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
    <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        
        <div class="text-center">
            <i class="fas fa-plus-circle text-[#297F4C] text-5xl mb-2"></i>
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
        </div>
        
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
    </div>
    </x-slot:title>

    <div class="max-w-4xl mx-auto">
        @if($ibuHamil->isEmpty())
            <!-- Tampilan jika tidak ada data ibu hamil -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                <div class="mb-4">
                    <i class="fas fa-exclamation-circle text-yellow-500 text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Ibu Hamil Belum Tersedia</h3>
                <p class="text-gray-600 mb-6">Silahkan tambahkan data ibu hamil terlebih dahulu</p>
                <a href="{{ route('ibu-hamil.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-[#297F4C] text-white rounded-md hover:bg-[#205937] transition-colors duration-200">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah Data Ibu Hamil
                </a>
            </div>
        @else
            <!-- Form tambah perkembangan -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <form action="{{ route('perkembangan-ibuhamil.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Pilih Ibu Hamil -->
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="id_ibuHamil" class="block text-sm font-medium text-gray-700 mb-1">Nama Ibu Hamil</label>
                            <select name="id_ibuHamil" id="id_ibuHamil" required 
                                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]">
                                <option value="">Pilih Ibu Hamil</option>
                                @foreach($ibuHamil as $ibu)
                                    <option value="{{ $ibu->id }}">{{ $ibu->Nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tanggal dan Bulan Kehamilan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="Bulan" class="block text-sm font-medium text-gray-700 mb-1">Bulan Pemeriksaan</label>
                            <input type="date" name="Bulan" id="Bulan" required
                                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]">
                        </div>
                        <div>
                            <label for="BulanKehamilan" class="block text-sm font-medium text-gray-700 mb-1">Bulan Kehamilan</label>
                            <input type="number" name="BulanKehamilan" id="BulanKehamilan" required
                                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]">
                        </div>
                    </div>

                    <!-- Data Pengukuran -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="BeratBadan" class="block text-sm font-medium text-gray-700 mb-1">Berat Badan (kg)</label>
                            <input type="number" step="0.1" name="BeratBadan" id="BeratBadan" required
                                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]"
                                   placeholder="60.5">
                        </div>
                        <div>
                            <label for="LingkarPerut" class="block text-sm font-medium text-gray-700 mb-1">Lingkar Perut (cm)</label>
                            <input type="number" step="0.1" name="LingkarPerut" id="LingkarPerut" required
                                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]"
                                   placeholder="85.0">
                        </div>
                        <div>
                            <label for="TekananDarah" class="block text-sm font-medium text-gray-700 mb-1">Tekanan Darah (mmHg)</label>
                            <input type="number" name="TekananDarah" id="TekananDarah" required
                                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#297F4C] focus:border-[#297F4C]"
                                   placeholder="120/80">
                        </div>
                    </div>

                    <!-- Tombol Submit dan Kembali -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('perkembangan-ibuhamil.index') }}" 
                           class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors duration-200">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-[#297F4C] text-white rounded-md hover:bg-[#205937] transition-colors duration-200">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</x-layout>