<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
    <div class="relative p-6 bg-gradient-to-r from-green-100 to-[#e3f2ed] rounded-lg shadow-md">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
        
        <div class="text-center">
            <i class="fas fa-chart-line text-[#297F4C] text-5xl mb-2"></i>
            <h2 class="text-3xl text-[#205937] font-semibold">{{ $title }}</h2>
            <h1 class='font-bold text-xl mt-2'>Posyandu Sakura RW 08</h1>
        </div>
        
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#205937] rounded-full"></div>
    </div>
    </x-slot:title>

    <!-- Filter Section -->
    <div class="mb-6 p-4 bg-white rounded-lg shadow-sm">
        <form action="{{ route('perkembangan-ibuhamil.index') }}" method="GET" class="flex gap-4 items-end">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Ibu Hamil</label>
                <select name="ibu_hamil" class="w-full border border-gray-300 rounded-md px-4 py-2">
                    <option value="">Semua Ibu Hamil</option>
                    @foreach($ibuHamil as $ibu)
                        <option value="{{ $ibu->id }}" {{ request('ibu_hamil') == $ibu->id ? 'selected' : '' }}>
                            {{ $ibu->Nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bulan Pemeriksaan</label>
                <input type="month" name="bulan" class="w-full border border-gray-300 rounded-md px-4 py-2" 
                    value="{{ request('bulan') }}">
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bulan Kehamilan</label>
                <select name="bulan_kehamilan" class="w-full border border-gray-300 rounded-md px-4 py-2">
                    <option value="">Semua Bulan</option>
                    @for($i = 1; $i <= 9; $i++)
                        <option value="{{ $i }}" {{ request('bulan_kehamilan') == $i ? 'selected' : '' }}>
                            Bulan {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="bg-[#297F4C] text-white px-6 py-2 rounded-md hover:bg-[#205937]">
                Filter
            </button>
        </form>
    </div>
    <div class="flex justify-end mb-4">
        <a href="{{ route('perkembangan-ibuhamil.export-pdf') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            Export to PDF
        </a>

        <a href="{{ route('perkembangan-ibuhamil.create') }}" class="bg-green-500 text-white px-4 py-2 ml-2 rounded-md hover:bg-green-600">
            Tambah Perkembangan
        </a>
    </div>


    <!-- Table -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-[#205937] text-white">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Ibu</th>
                <th class="px-4 py-2 border">Bulan Pemeriksaan</th>
                <th class="px-4 py-2 border">Bulan Kehamilan</th>
                <th class="px-4 py-2 border">Berat Badan</th>
                <th class="px-4 py-2 border">Lingkar Perut</th>
                <th class="px-4 py-2 border">Tekanan Darah</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perkembangan as $data)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $data->ibuHamil->Nama }}</td>
                <td class="border px-4 py-2">{{ $data->Bulan->format('F Y') }}</td>
                <td class="border px-4 py-2">{{ $data->BulanKehamilan }}</td>
                <td class="border px-4 py-2">{{ $data->BeratBadan }} kg</td>
                <td class="border px-4 py-2">{{ $data->LingkarPerut }} cm</td>
                <td class="border px-4 py-2">{{ $data->TekananDarah }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('perkembangan-ibuhamil.show', $data->id) }}">
                        <button class="bg-blue-500 text-white rounded-md px-3 py-1 hover:bg-blue-600">
                            Lihat
                        </button>
                    </a>
                    <a href="{{ route('perkembangan-ibuhamil.edit', $data->id) }}">
                        <button class="bg-yellow-500 text-white rounded-md px-3 py-1 hover:bg-yellow-600">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('perkembangan-ibuhamil.destroy', $data->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white rounded-md px-3 py-1 hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-layout>