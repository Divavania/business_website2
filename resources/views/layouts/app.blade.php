<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap & Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
            display: flex; /* KOREKSI: Membuat sidebar menjadi flex container */
            flex-direction: column; /* KOREKSI: Mengatur arah flex menjadi kolom */
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

        /* KOREKSI: Gaya untuk footer di dalam sidebar */
        .sidebar .copyright {
            margin-top: auto; /* Mendorong footer ke bawah */
            padding-bottom: 20px; /* Memberi sedikit padding di bawah */
            padding-left: 10px; /* Sesuaikan padding kiri/kanan */
            padding-right: 10px; /* Sesuaikan padding kiri/kanan */
            font-size: 0.8rem; /* Ukuran font lebih kecil untuk footer */
            color: #e2e8f0; /* Warna teks yang cocok dengan sidebar */
        }

        .topbar {
            height: 60px;
            background-color: #ffffff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
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

        .main-content {
            margin-left: 240px;
            padding: 80px 20px 20px 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        /* Styling for cards */
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

        /* Adjust table for simplicity */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead {
            background-color: #4797ec;
            color: white;
        }

        /* Adjusting the spacing and making the layout cleaner */
        .card-body .row {
            margin-bottom: 20px;
        }

        .container-fluid {
            padding: 0 30px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h5>Tigatra Admin
    </h5>
    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i>
        <span class="text">Dashboard</span>
    </a>
    {{-- KOREKSI: Menggunakan route() helper untuk rute backend produk --}}
    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i>
        <span class="text">Produk</span>
    </a>
    <a href="/contacts" class="{{ request()->is('contacts') ? 'active' : '' }}">
        <i class="bi bi-envelope"></i>
        <span class="text">Kontak Masuk</span>
    </a>
    <a href="/service" class="{{ request()->is('service') ? 'active' : '' }}">
        <i class="bi bi-wrench"></i>
        <span class="text">Service Center</span>
    </a>
    <a href="/about_backend" class="{{ request()->is('about_backend') ? 'active' : '' }}">
        <i class="bi bi-info-circle"></i>
        <span class="text">Tentang Kami</span>
    </a>
    {{-- BARU: Link untuk Company Info --}}
    <a href="{{ route('admin.company_info.index') }}" class="{{ request()->routeIs('admin.company_info.*') ? 'active' : '' }}">
        <i class="bi bi-building"></i> {{-- Ikon untuk perusahaan --}}
        <span class="text">Info Perusahaan</span>
    </a>
    {{-- Link Kelola Admin --}}
    {{-- Hanya tampilkan jika pengguna yang login adalah 'superadmin' --}}
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

<!-- Topbar -->
<div id="topbar" class="topbar">
    <button class="btn-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    <span><strong>Halo,</strong> {{ session('user')->nama }} ({{ session('user')->role }})</span>

    <!-- Ikon Pesan -->
    <a href="/contacts" class="position-relative">
        <i class="bi bi-envelope fs-4 text-dark"></i>
        @if(isset($unreadMessages) && $unreadMessages > 0) {{-- Menambahkan isset() check --}}
            <!-- Titik merah indikator pesan belum dibaca -->
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $unreadMessages }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @endif
    </a>
</div>

<!-- Main Content -->
<div id="mainContent" class="main-content">
    @yield('content')
</div>

<!-- Bootstrap JS + Sidebar Toggle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const topbar = document.getElementById('topbar');
        const content = document.getElementById('mainContent');

        sidebar.classList.toggle('collapsed');
        topbar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');

        // Simpan status sidebar ke localStorage
        if (sidebar.classList.contains('collapsed')) {
            localStorage.setItem('sidebarCollapsed', 'true');
        } else {
            localStorage.removeItem('sidebarCollapsed'); // Hapus jika tidak lagi collapsed
        }
    }

    // Periksa status sidebar saat halaman dimuat
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
