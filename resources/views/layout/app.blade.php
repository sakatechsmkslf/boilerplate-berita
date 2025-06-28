<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BERITA SAKA</title>
    <link rel="shortcut icon" href="{{ asset('logo-title.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding: 1rem;
        }

        .content {
            padding: 1rem;
        }
    </style>
</head>

<body>

    {{-- Bagian Navbar Header --}}

    {{-- <nav class="navbar bg-emphasis">
        <div class="container-fluid">
            <a class="navbar-brand d-flex gap-3" href="#">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="180" height="55"
                    class="d-inline-block align-text-top">
            </a>
            <h3 style="font-weight: 700;" class="mt-3">Boilerplate Berita</h3>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @endauth
        </div>
    </nav> --}}


    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            {{-- Logo --}}
            <a class="navbar-brand d-flex gap-3 align-items-center" href="#">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="130">
                {{-- <span class="fw-bold">Boilerplate Berita</span> --}}
            </a>
            <h3 style="font-weight: 700;" class="mt-3">Boilerplate Berita</h3>
            {{-- Tombol Hamburger --}}
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Logout --}}
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            @endauth
        </div>
    </nav>


    {{-- Bagian Body Container --}}
    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            <div class="col-md-2 sidebar collapse d-md-block bg-light" id="sidebarMenu"">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">🏠 Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategori.index') }}">📁 Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tag.index') }}">🏷️ Tag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">📰 Berita</a>
                    </li>
                </ul>
            </div>

            {{-- Main Content --}}
            <div class="col-md-10 content">
                <main>
                    <h3>@yield('title')</h3>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    {{-- Bootstrap Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https:///cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    @stack('scripts')

</body>

</html>
