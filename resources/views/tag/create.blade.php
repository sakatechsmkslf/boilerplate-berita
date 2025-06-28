@extends('layout.app')

@section('title', 'Tambah Tag')

@section('content')
    <form action="{{ route('tag.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama tag</label>
            <input type="text" name="nama_tag" class="form-control">
            @error('nama_tag')
                <span class="text-danger">Kolom nama tag harus di isi</span>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
