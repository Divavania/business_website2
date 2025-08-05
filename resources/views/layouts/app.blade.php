<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Admin | Tigatra Adikara')</title>

    {{-- Favicon dan Apple Touch Icon --}}
    <link href="{{ asset('template-assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template-assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #1e293b;
            color: white;
            padding-top: 20px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .sidebar h5 {
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .sidebar a {
            color: #e2e8f0;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            white-space: nowrap;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0ea5e9;
            color: white;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed h5,
        .sidebar.collapsed a span.text {
            display: none;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar.collapsed a i {
            margin-right: 0;
            text-align: center;
            display: block;
        }

        .sidebar .copyright {
            margin-top: auto;
            padding-bottom: 20px;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 0.8rem;
            color: #e2e8f0;
        }

        .topbar {
            height: 60px;
            background-color: #ffffff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            left: 240px;
            right: 0;
            top: 0;
            z-index: 1000;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: left 0.3s ease;
        }

        .topbar.collapsed {
            left: 70px;
        }

        .topbar .btn-toggle {
            font-size: 1.5rem;
            background: none;
            border: none;
            color: #333;
        }

        /* Styles for topbar notification */
        .topbar .notification-group {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .topbar .notification-icon {
            position: relative;
            font-size: 1.5rem;
            color: #555;
            text-decoration: none;
            margin-left: 15px;
        }

        .topbar .notification-icon:hover {
            color: #0ea5e9;
        }

        .topbar .notification-badge {
            position: absolute;
            top: -2px;
            right: -9px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 0.2em 0.5em;
            /* **UKURAN BARU:** Padding lebih kecil */
            font-size: 0.50em;
            /* **UKURAN BARU:** Ukuran font lebih kecil */
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 1.3em;
            /* **UKURAN BARU:** Min-width lebih kecil */
            height: 1.3em;
            /* **UKURAN BARU:** Height lebih kecil */
        }


        .main-content {
            margin-left: 240px;
            padding: 80px 20px 20px 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #014a79;
            margin-bottom: 20px;
        }

        .card .btn {
            background-color: #4797ec;
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #014a79;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead {
            background-color: #4797ec;
            color: white;
        }

        .card-body .row {
            margin-bottom: 20px;
        }

        .container-fluid {
            padding: 0 30px;
        }
    </style>
</head>

<body>

    <div id="sidebar" class="sidebar">
        <h5>Tigatra Admin</h5>
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="text">Dashboard</span>
        </a>

        {{-- <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i>
        <span class="text">Produk</span>
        </a> --}}

        <a href="/service" class="{{ request()->is('service') ? 'active' : '' }}">
            <i class="bi bi-wrench"></i>
            <span class="text">Service Center</span>
        </a>
        
        <a href="/about_backend" class="{{ request()->is('about_backend') ? 'active' : '' }}">
            <i class="bi bi-info-circle"></i>
            <span class="text">Tentang Kami</span>
        </a>

        <a href="{{ route('admin.organization-members.index') }}" class="{{ request()->routeIs('admin.organization-members.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i>
            <span class="text">Kelola Struktur Organisasi</span>
        </a>

        <a href="{{ route('admin.company_info.index') }}" class="{{ request()->routeIs('admin.company_info.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            <span class="text">Info Perusahaan</span>
        </a>

        <a href="{{ route('admin.solution.index') }}" class="{{ request()->routeIs('admin.solution.index') ? 'active' : '' }}">
            <i class="bi bi-gear-fill"></i>
            <span class="text">Kelola Solusi</span>
        </a>

        <a href="{{ route('contact_messages.index') }}" class="{{ request()->routeIs('contact_messages.*') ? 'active' : '' }}">
            <i class="bi bi-envelope"></i>
            <span class="text">Pesan Masuk</span>
        </a>

        <a href="{{ route('admin.vendors.index') }}" class="{{ request()->routeIs('admin.vendors.*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i>
            <span class="text">Kelola Vendor</span>
        </a>

        <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i>
            <span class="text">News & Event</span>
        </a>

        <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i>
            <span class="text">Kelola Proyek</span>
        </a>

        @if(session()->has('user') && session('user')->role == 'superadmin')
        <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span class="text">Kelola Admin</span>
        </a>
        @endif
        <a href="/logout" onclick="return confirm('Yakin mau logout?')">
            <i class="bi bi-box-arrow-right"></i>
            <span class="text">Logout</span>
        </a>
    </div>

    <div id="topbar" class="topbar d-flex align-items-center">
        <button class="btn-toggle d-none d-lg-block ms-3" id="desktopToggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        {{-- Group untuk nama pengguna dan notifikasi di kanan atas --}}
        @php
        use App\Models\Contact;
        $unreadMessagesCount = Contact::where('is_read', false)->count();
        @endphp

        <div class="notification-group">
            <span class="fw-bold me-3">Halo, {{ session('user')->nama }} ({{ session('user')->role }})</span>

            <a href="{{ route('contact_messages.index') }}" class="notification-icon">
                <i class="bi bi-envelope-fill"></i>
                @if($unreadMessagesCount > 0)
                <span class="notification-badge">{{ $unreadMessagesCount }}</span>
                @endif
            </a>
        </div>
    </div>

    <div id="mainContent" class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const topbar = document.getElementById('topbar');
            const content = document.getElementById('mainContent');

            sidebar.classList.toggle('collapsed');
            topbar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebarCollapsed', 'true');
            } else {
                localStorage.removeItem('sidebarCollapsed');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const topbar = document.getElementById('topbar');
            const content = document.getElementById('mainContent');

            if (localStorage.getItem('sidebarCollapsed') === 'true') {
                sidebar.classList.add('collapsed');
                topbar.classList.add('collapsed');
                content.classList.add('collapsed');
            }
        });
    </script>

</body>

</html>