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
            <div class="mb-6">
                <label for="Nama" class="block text-lg font-semibold text-gray-700 mb-2">Nama Ibu</label>
                <input type="text" id="Nama" name="Nama" required class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan nama ibu">
            </div>

            <div class="mb-6">
                <label for="TanggalLahir" class="block text-lg font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                <input type="date" id="TanggalLahir" name="TanggalLahir" required class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out">
            </div>

            <div class="mb-6">
                <label for="NoTelepon" class="block text-lg font-semibold text-gray-700 mb-2">No Telepon</label>
                <input type="text" id="NoTelepon" name="NoTelepon" required class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan no telepon">
            </div>

            <div class="mb-6">
                <label for="Alamat" class="block text-lg font-semibold text-gray-700 mb-2">Alamat</label>
                <textarea id="Alamat" name="Alamat" required class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan Alamat"></textarea>
            </div>

            <div class="mb-6">
                <label for="kehamilan_ke" class="block text-lg font-semibold text-gray-700 mb-2">Kehamilan Ke</label>
                <input type="number" id="kehamilan_ke" name="kehamilan_ke" required class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:ring-[#297F4C] focus:border-[#297F4C] transition duration-200 ease-in-out" placeholder="Masukkan angka kehamilan">
            </div>


            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-[#297F4C] text-white rounded-lg px-6 py-2 hover:bg-[#205937] transition duration-200 ease-in-out">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>

<style>
    body {
        background-color: #f9f9f9; 
        font-family: 'Arial', sans-serif; 
    }

    .rounded-lg {
        border-radius: 10px; 
    }

    input, textarea {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
        padding: 12px; 
        line-height: 1.5; 
    }

    input:focus, textarea:focus {
        outline: none; 
        box-shadow: 0 0 5px rgba( 0 , 123, 255, 0.5); 
    }

    button {
        transition: background-color 0.3s ease; 
    }

    button:hover {
        background-color: #205937; 
    }

    label {
        margin-bottom: 10px; 
    }

    input, textarea {
        margin-top: 5px; 
    }

    .mb-6 {
        margin-bottom: 20px; 
    }
</style>