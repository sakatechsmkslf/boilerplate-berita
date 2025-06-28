@extends('layout.app')
@section('title', 'Data Berita')

@section('content')
    <a href="{{ route('berita.create') }}" class="btn btn-success mb-3">+ Tambah Berita</a>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <table class="table table-bordered table-responsive" id="beritaTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>{{ $item->tgl_publish }}</td>
                    <td>
                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        new DataTable('#beritaTable');
    </script>
@endpush
