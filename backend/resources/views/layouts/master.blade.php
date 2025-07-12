<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Tigatra Adikara')</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">
    <!-- Custom CSS for subtle adjustments -->
    <style>
        .main-sidebar {
            background-color: #1a252f; /* Darker, professional sidebar */
        }
        .brand-link {
            border-bottom: 1px solid #2c3b41;
        }
        .nav-link.active {
            background-color: #007bff !important;
            color: #ffffff !important;
        }
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow */
        }
        .main-footer {
            background-color: #f4f6f9;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="Toggle Sidebar"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link" aria-label="Logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/dashboard') }}" class="brand-link">
            <span class="brand-text font-weight-light">Tigatra Admin</span>
        </a>
        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" aria-label="Dashboard">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/produk') }}" class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" aria-label="Produk">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/kontak') }}" class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" aria-label="Kontak Masuk">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Kontak Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/service-center') }}" class="nav-link {{ request()->is('service-center*') ? 'active' : '' }}" aria-label="Service Center">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Service Center</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/tentang-kami') }}" class="nav-link {{ request()->is('tentang-kami*') ? 'active' : '' }}" aria-label="Tentang Kami">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Tentang Kami</p>
                        </a>
                    </li>
                    @if(session('user') && session('user')->role === 'superadmin')
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}" aria-label="Kelola Admin">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Kelola Admin</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <small>&copy; {{ date('Y') }} PT Tigatra Adikara. All rights reserved.</small>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>