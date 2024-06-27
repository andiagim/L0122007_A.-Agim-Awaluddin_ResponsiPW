@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
@csrf
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('mahasiswa') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
        <div class="col-sm-10">
            {{ $data->nim }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='name' value="{{ $data->name }}" id="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ $data->email }}" id="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' value="{{ $data->jurusan }}" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="age" class="col-sm-2 col-form-label">Umur</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='age' value="{{ $data->age }}" id="age">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='address' value="{{ $data->address }}" id="address">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">Simpan Perubahan</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection
