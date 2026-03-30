@extends('auth.layout.main')

@section('main-content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-center">
                            <h1>Login</h1>
                        </div>
                        <div class="card-header text-center">
                            <h4>SIM Perpustakaan</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/login" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        tabindex="1" required autofocus value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright © Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        @if (session()->has('success'))
            iziToast.success({
                title: 'Berhasil',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif
        @if (session()->has('loginError'))
            iziToast.error({
                title: 'Berhasil',
                message: '{{ session('loginError') }}',
                position: 'topRight'
            });
        @endif
    </script>
@endsection
