<title>{{ $title }}</title>
<x-layout>
    <x-slot:title>
    <div>
    <div class ="header-image" style="display: flex; align-items: center; background-color: #E8F5E9; padding: 20px;">
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
</x-slot:title>
<div class= "body-style" style="padding: 20px;">
    <h1 style="font-size: 36px; font-weight: bold; margin: 0; color: white; font-family: 'Potta One';">Data Posyandu Sakura RW 08</h1>
    <p style="font-size: 18px; margin-top: 10px; color: black; font-family: 'Poppins';"> Jumlah Bayi dan Ibu Hamil Serta Jumlah Bayi yang terdata di Posyandu Sakura RW 08</p>
    

</div>
</x-layout>