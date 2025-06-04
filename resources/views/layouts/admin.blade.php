<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --sidebar-bg: #2c3e50;
            --sidebar-active: #34495e;
            --text-light: #ecf0f1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        #wrapper {
            min-height: 100vh;
        }

        #sidebar-wrapper {
            min-width: var(--sidebar-width);
            width: var(--sidebar-width);
            min-height: 100vh;
            background-color: var(--sidebar-bg);
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        #page-content-wrapper {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
        }

        .toggled #sidebar-wrapper {
            min-width: var(--sidebar-collapsed-width);
            width: var(--sidebar-collapsed-width);
        }

        .toggled #page-content-wrapper {
            width: calc(100% - var(--sidebar-collapsed-width));
            margin-left: var(--sidebar-collapsed-width);
        }

        .toggled .sidebar-text {
            display: none;
        }

        .toggled .sidebar-brand {
            justify-content: center;
            padding: 1rem 0.5rem;
        }

        .toggled .sidebar-brand h4 {
            display: none;
        }

        .toggled .sidebar-brand .sidebar-logo {
            font-size: 1.5rem;
            margin: 0;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 1.5rem 1rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand h4 {
            margin: 0 0 0 10px;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .sidebar-logo {
            font-size: 1.75rem;
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .sidebar-divider {
            height: 0;
            margin: 0.5rem 0;
            overflow: hidden;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-heading {
            padding: 1rem 1rem 0.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.6);
        }

        .nav-item {
            padding: 0.15rem 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.8) !important;
            border-radius: 0.25rem;
            margin: 0 0.5rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white !important;
        }

        .nav-link.active {
            background-color: var(--sidebar-active);
            color: white !important;
        }

        .nav-link i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
            font-size: 1rem;
        }

        .navbar {
            background-color: white !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .navbar-brand {
            font-weight: 600;
        }

        .dropdown-menu {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
        }

        .content-wrapper {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .btn-toggle-menu {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-toggle-menu:hover,
        .btn-toggle-menu:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        @media (max-width: 768px) {
            #sidebar-wrapper {
                min-width: var(--sidebar-collapsed-width);
                width: var(--sidebar-collapsed-width);
            }

            #page-content-wrapper {
                width: calc(100% - var(--sidebar-collapsed-width));
                margin-left: var(--sidebar-collapsed-width);
            }

            .sidebar-text {
                display: none;
            }

            .sidebar-brand {
                justify-content: center;
                padding: 1rem 0.5rem;
            }

            .sidebar-brand h4 {
                display: none;
            }

            .sidebar-brand .sidebar-logo {
                font-size: 1.5rem;
                margin: 0;
            }

            .expanded #sidebar-wrapper {
                min-width: var(--sidebar-width);
                width: var(--sidebar-width);
            }

            .expanded #page-content-wrapper {
                width: calc(100% - var(--sidebar-width));
                margin-left: var(--sidebar-width);
            }

            .expanded .sidebar-text {
                display: inline;
            }

            .expanded .sidebar-brand {
                justify-content: flex-start;
                padding: 1.5rem 1rem;
            }

            .expanded .sidebar-brand h4 {
                display: block;
                margin: 0 0 0 10px;
            }

            .expanded .sidebar-brand .sidebar-logo {
                font-size: 1.75rem;
                margin-right: 0.5rem;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-brand">
                <i class="bi bi-speedometer2 sidebar-logo"></i>
                <h4 class="sidebar-text">Admin Panel</h4>
            </div>

            <div class="sidebar-divider"></div>

            <div class="sidebar-heading">
                Core
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-house-door"></i>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-heading">
                Management
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/users') }}">
                        <i class="bi bi-people"></i>
                        <span class="sidebar-text">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                       <i class="bi bi-file-earmark-text"></i>
                        <span class="sidebar-text">Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/berita') }}">
                        <i class="bi bi-newspaper"></i>
                        <span class="sidebar-text">Berita</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-heading">
                Settings
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear"></i>
                        <span class="sidebar-text">General</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-shield-lock"></i>
                        <span class="sidebar-text">Security</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="sidebar-text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom sticky-top">
                <div class="container-fluid">
                    <button class="btn btn-primary btn-toggle-menu" id="menu-toggle">
                        <i class="bi bi-list"></i>
                    </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-bell"></i>
                                    <span class="badge bg-danger rounded-pill">3</span>
                                </a>
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle"></i> Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">@yield('title')</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>

                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toggle menu script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuToggle = document.getElementById("menu-toggle");
            const wrapper = document.getElementById("wrapper");
            
            // Check for saved preference
            const sidebarCollapsed = localStorage.getItem("sidebar-collapsed") === "true";
            if (sidebarCollapsed) {
                wrapper.classList.add("toggled");
            }
            
            menuToggle.addEventListener("click", function() {
                wrapper.classList.toggle("toggled");
                
                // Save preference
                localStorage.setItem("sidebar-collapsed", wrapper.classList.contains("toggled"));
            });
            
            // Responsive behavior
            function checkWidth() {
                if (window.innerWidth <= 768) {
                    wrapper.classList.add("toggled");
                    
                    // Add mobile expand functionality
                    document.querySelectorAll("#sidebar-wrapper .nav-link").forEach(link => {
                        link.addEventListener("click", function() {
                            if (window.innerWidth <= 768) {
                                wrapper.classList.remove("expanded");
                            }
                        });
                    });
                    
                    menuToggle.addEventListener("click", function() {
                        if (window.innerWidth <= 768) {
                            wrapper.classList.toggle("expanded");
                        }
                    });
                }
            }
            
            // Initial check
            checkWidth();
            
            // On resize
            window.addEventListener("resize", checkWidth);
        });
    </script>

    @stack('scripts')
</body>
</html>