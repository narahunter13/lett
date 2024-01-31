<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leet | {{ $title ?? 'Lett' }}</title>

    @vite('resources/js/app.js')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="https://eu.ui-avatars.com/api/?name=Lett" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Lett</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-house"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-header">SURAT</li>
                        <li class="nav-item">
                            <a href="/surat-masuk" class="nav-link {{ $title == 'Surat Masuk' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-inbox"></i>
                                <p>Surat Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surat-keluar" class="nav-link {{ $title == 'Surat Keluar' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope-open"></i>
                                <p>Surat Keluar</p>
                            </a>
                        </li>
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="/keluar" class="nav-link">
                                <i class="nav-icon fas fa-right-from-bracket"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title ?? 'Lett' }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://lubuklinggaukota.bps.go.id/">BPS Kota Lubuk Linggau</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    {{ $script ?? '' }}
</body>

</html>