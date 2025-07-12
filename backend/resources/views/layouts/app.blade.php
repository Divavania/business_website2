<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
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
        }

        .sidebar h5 {
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #e2e8f0;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            white-space: nowrap;
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

        .main-content {
            margin-left: 240px;
            padding: 80px 20px 20px 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        .btn-toggle {
            border: none;
            background: none;
            font-size: 1.3rem;
            color: #333;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h5>Tigatra Admin</h5>
    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i>
        <span class="text">Dashboard</span>
    </a>
    <a href="/products" class="{{ request()->is('products') ? 'active' : '' }}">
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
    <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">
        <i class="bi bi-info-circle"></i>
        <span class="text">Tentang Kami</span>
    </a>
    <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        <span class="text">Kelola Admin</span>
    </a>
    <a href="/logout" onclick="return confirm('Yakin mau logout?')">
        <i class="bi bi-box-arrow-right"></i>
        <span class="text">Logout</span>
    </a>
</div>

<!-- Topbar -->
<div id="topbar" class="topbar">
    <button class="btn-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    <span><strong>Halo,</strong> {{ session('user')->nama }} ({{ session('user')->role }})</span>
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
    }
</script>

</body>
</html>
