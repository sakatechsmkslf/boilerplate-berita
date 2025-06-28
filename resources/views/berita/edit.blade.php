@extends('layout.app')
@section('title', 'Edit Berita')

@section('content')
    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" id="editor" rows="5">{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            @if ($berita->path_gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $berita->path_gambar) }}" width="100" alt="Gambar Berita">
                </div>
            @endif
            <input type="file" name="path_gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Publish</label>
            <input type="date" name="tgl_publish" class="form-control"
                value="{{ old('tgl_publish', \Carbon\Carbon::parse($berita->tgl_publish)->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="pending"
                    {{ old('status', $berita->status) == 'pending' ? 'checked' : '' }}>
                <label class="form-check-label">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="done"
                    {{ old('status', $berita->status) == 'done' ? 'checked' : '' }}>
                <label class="form-check-label">Done</label>
            </div>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}"
                        {{ old('kategori_id', $berita->kategori_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tag Berita</label><br>
            @foreach ($tag as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $item->id }}"
                        {{ in_array($item->id, old('tag_id', $berita->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $item->nama_tag }}</label>
                </div>
            @endforeach
        </div>


        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
