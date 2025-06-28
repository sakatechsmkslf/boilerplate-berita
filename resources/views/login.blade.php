<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="card mx-5 my-5">
            <div class="card-body text-center">
                <img src="{{ asset('logo.png') }}" alt="logo sakatech" width="230" height="100" class="m-2">
                <h3 class="card-title" style="font-weight: 700;">Login</h3>
                <h6 class="card-text h-4">SAKATECH SMK Salafiyah</h6>
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
            <div class="px-4 py-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-2">Email :</label>
                        <input type="email" name="email" class="form-control" autofocus>
                        @error('email')
                            <small class="text-danger">Kolom email harus di isi</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Password :</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">Kolom password harus di isi</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>

        {{-- <h3>Login Admin</h3> --}}

    </div>
</body>

</html>
