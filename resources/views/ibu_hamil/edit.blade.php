@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Ibu Hamil</h1>

    <form action="{{ route('ibu-hamil.update', $ibuHamil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" name="Nama" value="{{ $ibuHamil->Nama }}" required>
        </div>
        <div class="form-group">
            <label for="TanggalLahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="TanggalLahir" value="{{ $ibuHamil->TanggalLahir }}" required>
        </div>
        <div class="form-group">
            <label for="NoTelepon">No Telepon</label>
            <input type="text" class="form-control"