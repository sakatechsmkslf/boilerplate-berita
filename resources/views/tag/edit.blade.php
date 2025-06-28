@extends('layout.app')

@section('title', 'Edit Tag')

@section('content')
    <form action="{{ route('tag.update', $tag->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Tag</label>
            <input type="text" name="nama_tag" class="form-control" value="{{ $tag->nama_tag }}" required>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
