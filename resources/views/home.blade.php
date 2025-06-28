@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="p-2">
        <div class="card mb-4">
            <div class="card-body">
                Selamat datang di dashboard Software House Sakatech SMK Salafiyah! 🎓
                <br>Silakan pilih menu di sidebar untuk mulai mengelola data.
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($berita as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $item->path_gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-muted">
                                <small>Dipublish:
                                    {{ \Carbon\Carbon::parse($item->tgl_publish)->translatedFormat('d F Y') }}</small>
                            </p>
                            <p class="card-text">
                                @foreach ($item->tags as $t)
                                    <span class="badge bg-primary">{{ $t->nama_tag }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
