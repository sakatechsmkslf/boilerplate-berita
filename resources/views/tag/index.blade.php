@extends('layout.app')

@section('title', 'Manajemen Tag')

@section('content')
    <a href="{{ route('tag.create') }}" class="btn btn-success mb-3">+ Tambah Tag</a>

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


    <table class="table table-bordered" id="tagTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Tag</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tag as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_tag }}</td>
                    <td>
                        <a href="{{ route('tag.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tag.destroy', $item->id) }}" method="POST" class="d-inline"
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
        new DataTable('#tagTable');
    </script>
@endpush
