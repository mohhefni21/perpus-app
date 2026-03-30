<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SPK-BLT</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">
    {{-- modules --}}
    <link rel="stylesheet" href="{{ url('assets/modules/izitoast/css/iziToast.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>
    {{-- modules --}}
    <script src="{{ url('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ url('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/modules/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    {{-- Push --}}
    @stack('styles')
    @stack('scripts')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Topbar --}}
            @include('layout.components.header')
            {{-- Sidebar --}}
            @include('layout.components.sidebar')
            {{-- Content --}}
            @yield('main-content')
            {{-- Footer --}}
            @include('layout.components.footer')
        </div>
    </div>
</body>

</html>
