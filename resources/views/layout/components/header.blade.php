<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ url('assets/img/avatar/default.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" onclick="optimasiSistem()" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-solid fa-broom"></i> Optimasi sistem
                </a>
                <form action="/logout" method="post" id="logout-form">
                    @csrf
                    <a href="javascript:{}" onclick="document.getElementById('logout-form').submit(); return false;"
                        class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i>
                        Logout</a>
                </form>
            </div>
        </li>
    </ul>
</nav>

<script>
    function optimasiSistem() {
        $.ajax({
            type: 'GET',
            url: 'optimasi-sistem',
            success: function(response) {
                if (response.success == true) {
                    iziToast.success({
                        title: 'Berhasil',
                        message: response.message,
                        position: 'topRight'
                    });
                }
            }
        })
    }
</script>
