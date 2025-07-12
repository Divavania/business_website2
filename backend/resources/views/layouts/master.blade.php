<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Tigatra Adikara</title>
    <!-- AdminLTE CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/dashboard') }}" class="brand-link">
            <span class="brand-text font-weight-light">Tigatra Admin</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> <p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="{{ url('/produk') }}" class="nav-link"><i class="nav-icon fas fa-box"></i> <p>Produk</p></a></li>
                    <li class="nav-item"><a href="{{ url('/kontak') }}" class="nav-link"><i class="nav-icon fas fa-envelope"></i> <p>Kontak Masuk</p></a></li>
                    <li class="nav-item"><a href="{{ url('/service-center') }}" class="nav-link"><i class="nav-icon fas fa-tools"></i> <p>Service Center</p></a></li>
                    <li class="nav-item"><a href="{{ url('/tentang-kami') }}" class="nav-link"><i class="nav-icon fas fa-building"></i> <p>Tentang Kami</p></a></li>
                    @if(session('user')->role == 'superadmin')
                        <li class="nav-item"><a href="{{ url('/users') }}" class="nav-link"><i class="nav-icon fas fa-user-cog"></i> <p>Kelola Admin</p></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <small>&copy; {{ date('Y') }} PT Tigatra Adikara</small>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
