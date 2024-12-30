<title>Tambah Ibu Hamil</title>
<x-layout>
    <x-slot:title>
        <div class="text-center text-2xl text-[#205937] mb-4">
            <h1 class="font-bold">Tambah Ibu Hamil</h1>
            <h2 class="text-lg">Posyandu Sakura RW 08</h2>
        </div>
    </x-slot:title>

    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ibu-hamil.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                <input type="text" id="nama" name="nama" required class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan nama ibu">
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out">
            </div>

            <div class="mb-4">
                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" required class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan no telepon">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" required class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan alamat"></textarea>
            </div>

            <!-- Tombol Simpan -->
    <div class="flex justify-end mt-6"> <!-- Menambahkan mt-6 untuk jarak atas -->
    <button type="submit" class="bg-[#297F4C] text-white rounded-lg px-6 py-2 hover:bg-[#205937] transition duration-200 ease-in-out">
        Simpan
    </button>
</div>
        </form>
    </div>
</x-layout>