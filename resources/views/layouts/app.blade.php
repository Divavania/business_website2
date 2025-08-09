<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'Dashboard Admin | Tigatra Adikara')</title>

    <link href="{{ asset('template-assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template-assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 240px;
            --sidebar-collapsed-width: 70px;
            --topbar-height: 60px;
            --primary-color: #4797ec;
            --sidebar-bg: #1e293b;
            --text-color: #e2e8f0;
            --header-color: #94a3b8;
            --hover-bg: rgba(255, 255, 255, 0.1);
            --active-bg: rgba(255, 255, 255, 0.2);
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--sidebar-bg);
            color: var(--text-color);
            padding-top: 1.5rem;
            transition: width 0.3s ease;
            display: flex;
            flex-direction: column;
            z-index: 1100;
            overflow-y: auto;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar h5 {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            text-align: center;
            margin-bottom: 1.5rem;
            color: #fff;
        }

        .sidebar-header {
            color: var(--header-color);
            font-size: 0.85rem;
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .sidebar a {
            color: var(--text-color);
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            transition: background-color 0.3s ease;
            border-radius: 6px;
            margin: 0.2rem 1rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: var(--hover-bg);
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .sidebar a.active {
            background-color: var(--active-bg);
            color: var(--primary-color);
        }

        .sidebar a i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            min-width: 1.25rem;
            text-align: center;
            color: var(--header-color);
        }
        
        .sidebar a.active i {
            color: var(--primary-color);
        }
        
        .sidebar a:hover i {
            color: var(--primary-color);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar.collapsed h5,
        .sidebar.collapsed .sidebar-header,
        .sidebar.collapsed a span.text {
            display: none;
        }

        .sidebar.collapsed a i {
            margin: 0;
            font-size: 1.2rem;
            text-align: center;
            color: var(--text-color);
        }
        
        .sidebar.collapsed a.active i {
            color: var(--primary-color);
        }

        .sidebar-menu-item {
            margin: 0.2rem 1rem;
            border-radius: 6px;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .topbar {
            height: var(--topbar-height);
            background-color: #ffffff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            left: var(--sidebar-width);
            right: 0;
            top: 0;
            z-index: 1000;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: left 0.3s ease;
        }

        .topbar.collapsed {
            left: var(--sidebar-collapsed-width);
        }

        .topbar .btn-toggle {
            font-size: 1.5rem;
            background: none;
            border: none;
            color: #333;
            padding: 0.5rem;
        }

        .topbar .notification-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar .notification-icon {
            position: relative;
            font-size: 1.5rem;
            color: #555;
            text-decoration: none;
        }

        .topbar .notification-icon:hover {
            color: var(--primary-color);
        }

        .topbar .notification-badge {
            position: absolute;
            top: -0.2rem;
            right: -0.5rem;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 0.2em 0.5em;
            font-size: 0.65em;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 1.3em;
            height: 1.3em;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: calc(var(--topbar-height) + 1rem) 1rem 1rem;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .main-content.collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-body {
            padding: clamp(1rem, 3vw, 1.5rem);
        }

        .card-title {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #014a79;
            margin-bottom: 1rem;
        }

        .card .btn {
            background-color: #4797ec;
            color: white;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #014a79;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: clamp(0.5rem, 2vw, 0.75rem);
        }

        .table thead {
            background-color: #4797ec;
            color: white;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

        .bi-chevron-down {
            transition: transform 0.3s ease;
        }

        .bi-chevron-down.rotate,
        .submenu.show~a i.bi-chevron-down,
        .dropdown-toggle[aria-expanded="true"] i.bi-chevron-down {
            transform: rotate(180deg);
        }

        .dropdown-toggle-wrapper {
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar .copyright {
            margin-top: auto;
            padding: 1rem;
            font-size: clamp(0.7rem, 1.5vw, 0.75rem);
            text-align: center;
            color: #94a3b8;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .swal2-container {
            z-index: 1200 !important;
        }

        .swal2-popup {
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
        }

        .swal2-confirm {
            background-color: #4797ec !important;
            border-color: #4797ec !important;
        }

        .swal2-confirm:hover {
            background-color: #014a79 !important;
        }

        .swal2-cancel {
            background-color: #6c757d !important;
            border-color: #6c757d !important;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: var(--sidebar-width);
                position: fixed;
                left: 0;
                top: 0;
            }

            .sidebar.collapsed {
                width: var(--sidebar-collapsed-width);
            }

            .topbar {
                left: var(--sidebar-width);
            }

            .topbar.collapsed {
                left: var(--sidebar-collapsed-width);
            }

            .main-content {
                margin-left: var(--sidebar-width);
            }

            .main-content.collapsed {
                margin-left: var(--sidebar-collapsed-width);
            }

            .topbar .btn-toggle {
                display: inline-block !important;
            }

            .swal2-container {
                padding: 1rem;
            }

            .swal2-popup {
                max-width: calc(100% - var(--sidebar-width)) !important;
                margin-left: auto;
                margin-right: 1rem;
            }

            .sidebar.collapsed~.swal2-container .swal2-popup {
                max-width: calc(100% - var(--sidebar-collapsed-width)) !important;
            }
        }

        @media (max-width: 576px) {
            :root {
                --sidebar-width: 200px;
                --sidebar-collapsed-width: 60px;
            }

            .sidebar {
                width: var(--sidebar-width);
            }

            .sidebar.collapsed {
                width: var(--sidebar-collapsed-width);
            }

            .topbar {
                left: var(--sidebar-width);
            }

            .topbar.collapsed {
                left: var(--sidebar-collapsed-width);
            }

            .main-content {
                margin-left: var(--sidebar-width);
            }

            .main-content.collapsed {
                margin-left: var(--sidebar-collapsed-width);
            }

            .topbar .notification-group span {
                font-size: clamp(0.7rem, 2.2vw, 0.8rem);
            }

            .card-body {
                padding: 0.8rem;
            }

            .card-title {
                font-size: clamp(0.9rem, 2.2vw, 1rem);
            }

            .table {
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
            }

            .sidebar a {
                font-size: clamp(0.8rem, 1.8vw, 0.9rem);
            }

            .sidebar h5 {
                font-size: clamp(0.9rem, 2.2vw, 1rem);
            }

            .swal2-popup {
                max-width: calc(100% - var(--sidebar-width)) !important;
                font-size: 0.9rem;
                margin-left: auto;
                margin-right: 0.5rem;
            }

            .sidebar.collapsed~.swal2-container .swal2-popup {
                max-width: calc(100% - var(--sidebar-collapsed-width)) !important;
            }
        }
    </style>
</head>

<body>
    @stack('scripts')

    <div id="sidebar" class="sidebar">
        <h5>Tigatra Admin</h5>

        <h6 class="sidebar-header">Navigasi</h6>
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="text">Dashboard</span>
        </a>

        <h6 class="sidebar-header">Data</h6>
        <a href="{{ route('admin.vendors.index') }}" class="{{ request()->routeIs('admin.vendors.*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i>
            <span class="text">Vendor</span>
        </a>
        <a href="{{ route('admin.solution.index') }}" class="{{ request()->routeIs('admin.solution.*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            <span class="text">Solusi</span>
        </a>

        <h6 class="sidebar-header">Konten</h6>
        <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i>
            <span class="text">News & Event</span>
        </a>
        <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i>
            <span class="text">Kelola Proyek</span>
        </a>

        @if(session()->has('user') && session('user')->role == 'superadmin')
        <h6 class="sidebar-header">Akun</h6>
        <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">
            <i class="bi bi-person-lines-fill"></i>
            <span class="text">Kelola Admin</span>
        </a>
        @endif

        <h6 class="sidebar-header">Informasi Umum</h6>
        <a href="{{ route('admin.company_info.index') }}" class="{{ request()->routeIs('admin.company_info.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            <span class="text">Info Perusahaan</span>
        </a>
        <a href="{{ route('admin.organization-members.index') }}" class="{{ request()->routeIs('admin.organization-members.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i>
            <span class="text">Struktur Organisasi</span>
        </a>
        <a href="/about_backend" class="{{ request()->is('about_backend') ? 'active' : '' }}">
            <i class="bi bi-info-square"></i>
            <span class="text">Tentang Kami</span>
        </a>
        <a href="/service" class="{{ request()->is('service') ? 'active' : '' }}">
            <i class="bi bi-wrench"></i>
            <span class="text">Service Center</span>
        </a>

        <h6 class="sidebar-header">Komunikasi</h6>
        <a href="{{ route('contact_messages.index') }}" class="{{ request()->routeIs('contact_messages.*') ? 'active' : '' }}">
            <i class="bi bi-envelope"></i>
            <span class="text">Pesan Masuk</span>
        </a>

        <a href="/logout" id="logout-link">
            <i class="bi bi-box-arrow-right"></i>
            <span class="text">Logout</span>
        </a>

        <div class="copyright">
            &copy; {{ date('Y') }} Tigatra Adikara. All rights reserved.
        </div>
    </div>

    <div id="topbar" class="topbar d-flex align-items-center">
        <button class="btn-toggle ms-3" id="sidebarToggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <div class="notification-group">
            <span class="fw-bold me-3">Halo, {{ session('user')->nama }} ({{ session('user')->role }})</span>
            <a href="{{ route('contact_messages.index') }}" class="notification-icon">
                <i class="bi bi-envelope-fill"></i>
                @php
                use App\Models\Contact;
                $unreadMessagesCount = Contact::where('is_read', false)->count();
                @endphp
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            window.dispatchEvent(new Event('resize'));
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

            window.addEventListener('resize', function() {
                const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                const swalPopup = document.querySelector('.swal2-popup');
                if (swalPopup && window.innerWidth <= 992) {
                    swalPopup.style.maxWidth = `calc(100% - ${isSidebarCollapsed ? '60px' : '200px'})`;
                    swalPopup.style.marginLeft = 'auto';
                    swalPopup.style.marginRight = '0.5rem';
                }
            });
        });

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#4797ec',
            confirmButtonText: 'OK',
            timer: 5000,
            timerProgressBar: true,
            willOpen: () => {
                const sidebar = document.getElementById('sidebar');
                const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                if (window.innerWidth <= 992) {
                    Swal.getPopup().style.maxWidth = `calc(100% - ${isSidebarCollapsed ? '60px' : '200px'})`;
                    Swal.getPopup().style.marginLeft = 'auto';
                    Swal.getPopup().style.marginRight = '0.5rem';
                }
            }
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Tutup',
            timer: 5000,
            timerProgressBar: true,
            willOpen: () => {
                const sidebar = document.getElementById('sidebar');
                const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                if (window.innerWidth <= 992) {
                    Swal.getPopup().style.maxWidth = `calc(100% - ${isSidebarCollapsed ? '60px' : '200px'})`;
                    Swal.getPopup().style.marginLeft = 'auto';
                    Swal.getPopup().style.marginRight = '0.5rem';
                }
            }
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Tutup',
            timer: 5000,
            timerProgressBar: true,
            willOpen: () => {
                const sidebar = document.getElementById('sidebar');
                const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                if (window.innerWidth <= 992) {
                    Swal.getPopup().style.maxWidth = `calc(100% - ${isSidebarCollapsed ? '60px' : '200px'})`;
                    Swal.getPopup().style.marginLeft = 'auto';
                    Swal.getPopup().style.marginRight = '0.5rem';
                }
            }
        });
        @endif

        document.getElementById('logout-link').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4797ec',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal',
                willOpen: () => {
                    const sidebar = document.getElementById('sidebar');
                    const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                    if (window.innerWidth <= 992) {
                        Swal.getPopup().style.maxWidth = `calc(100% - ${isSidebarCollapsed ? '60px' : '200px'})`;
                        Swal.getPopup().style.marginLeft = 'auto';
                        Swal.getPopup().style.marginRight = '0.5rem';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        });
    </script>
</body>

</html>