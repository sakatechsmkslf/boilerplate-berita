@extends('layout.app')

@section('title', 'Tambah Kategori')

@section('content')
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control">
            @error('nama_kategori')
                <small class="text-danger">Kolom nama kategori harus di isi</small>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
