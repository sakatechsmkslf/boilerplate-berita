@extends('layout.app')

@section('title', 'Manajemen Kategori')


@section('content')
    <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>

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

    <table class="table table-bordered" id="kategoriTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>Data Kategori Tidak Ada</p>
            @endforelse
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        new DataTable('#kategoriTable');
    </script>
@endpush
