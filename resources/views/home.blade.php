<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
        <div>
            <div class="header-image" style="display: flex; align-items: center; background-color: #E8F5E9; padding: 20px;">
                <!-- Kolom Teks -->
                <div style="flex: 1">
                    <h1 style="font-size: 36px; font-weight: bold; margin: 0; font-family: 'Potta One';">E-POSYANDU</h1>
                    <p style="font-size: 18px; margin-top: 10px; color: black; font-weight: normal; font-family: 'Poppins';">
                        Sistem yang membantu mengelola data bayi dan ibu hamil sebagai bentuk pencegahan 
                        permasalahan stunting di Indonesia. Sistem ini menyediakan visualisasi data perkembangan 
                        dari ibu hamil dan bayi.
                    </p>
                </div>
                <!-- Kolom Logo -->
                <div style="flex: 0 0 auto; margin-left: 20px;">
                    <img src="{{ asset('img/Logo_Fix.png') }}" alt="logo" style="width: 300px; height: auto;">
                </div>
            </div>
        </div>
    </x-slot:title>

    <!-- jumlah bayi dan Ibu Hamil -->
    <div class="body-style" style="padding: 20px;">
        <h1 style="font-size: 36px; font-weight: bold; margin: 0; color: #297F4C; font-family: 'Potta One';">Data Posyandu Sakura RW 08</h1>
        <p style="font-size: 18px; margin-top: 10px; color: black; font-family: 'Poppins';">
            Jumlah Bayi dan Ibu Hamil Serta Jumlah Bayi yang terdata di Posyandu Sakura RW 08
        </p>
       <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
        <!-- Jumlah Bayi -->
        <div style="text-align: center;">
            <div style="
                width: 200px; 
                height: 200px; 
                border: 2px dashed #297F4C; 
                border-radius: 50%; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                margin: 0 auto;">
                <div style="width: 80px; height: 80px;">
                    <img src="{{ asset('img/baby.png') }}" alt="baby" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <strong style="font-size: 18px; color: black;">{{$jumlahBayi}}</strong>
                <span style="font-size: 18px; color: black; margin-top: 10px; display: block;">Bayi</span>
            </div>
        </div>

        <!-- Jumlah Ibu Hamil -->
        <div style="text-align: center;">
            <div style="
                width: 200px; 
                height: 200px; 
                border: 2px dashed #297F4C; 
                border-radius: 50%; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                margin: 0 auto;">
                <div style="width: 80px; height: 80px;">
                    <img src="{{ asset('img/pregnant.png') }}" alt="IbuHamil" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <strong style="font-size: 18px; color: black;">{{$jumlahIbuHamil}}</strong>
                <span style="font-size: 18px; color: black; margin-top: 10px; display: block;">Ibu Hamil</span>
            </div>
        </div>
    </div>
</x-layout>