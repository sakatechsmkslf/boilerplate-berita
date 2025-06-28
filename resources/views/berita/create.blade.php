@extends('layout.app')
@section('title', 'Tambah Berita')

@section('content')

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
            @error('judul')
                <small class="text-danger">Kolom judul harus di Isi</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" id="editor" rows="5">{{ old('isi') }}</textarea>
            @error('isi')
                <small class="text-danger">Kolom isi berita harus di isi</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            {{-- @if ($berita->path_gambar)
                <div><img src="{{ asset('storage/' . $berita->path_gambar) }}" width="100"></div>
            @endif --}}
            <input type="file" name="path_gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Publish</label>
            <input type="date" name="tgl_publish" class="form-control" value="{{ old('tgl_publish') }}">
            @error('tgl_publish')
                <small class="text-danger">Kolom tanggal harus di isi</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="pending"
                    {{ old('status') == 'pending' ? 'checked' : '' }}>
                <label class="form-check-label">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="done"
                    {{ old('status') == 'done' ? 'checked' : '' }}>

                <label class="form-check-label">Done</label>
            </div>
            @error('status')
                <br><small class="text-danger">Pilih salah satu status</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <small class="text-danger">Kolom kategori harus di isi</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Tag Berita</label><br>
            @foreach ($tag as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $item->id }}"
                        {{ collect(old('tag_id'))->contains($item->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $item->nama_tag }}</label>
                </div>
            @endforeach
            @error('tag_id')
                <br><small class="text-danger">Minimal pilih satu tag</small>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
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
