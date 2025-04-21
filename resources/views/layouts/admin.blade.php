<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --accent: #e74c3c;
            --text-color: #ecf0f1;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #2c3e50;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        aside.sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-color);
            padding: 20px;
            flex-shrink: 0;
        }

        .sidebar h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1px;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            color: var(--text-color);
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background-color: var(--sidebar-hover);
        }

        .sidebar nav ul li ul {
            margin-top: 5px;
            margin-left: 15px;
        }

        .sidebar nav ul li ul li a {
            font-size: 14px;
            padding-left: 20px;
        }

        .sidebar nav ul li a.logout {
            color: var(--accent);
        }

        .sidebar nav ul li a.logout:hover {
            background-color: var(--accent);
            color: white;
        }

        main.content {
            flex-grow: 1;
            padding: 40px;
        }

        header h1 {
            font-size: 26px;
            margin-bottom: 25px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        section {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="#">📊 Dashboard</a></li>
                    
                    <li>
                        <span>👤 Pengguna</span>
                        <ul>
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">Siswa</a></li>
                            <li><a href="#">Guru</a></li>
                        </ul>
                    </li>

                    <li>
                        <span>🎓 Akademik</span>
                        <ul>
                            <li><a href="#">Kelas</a></li>
                            <li><a href="#">Jadwal</a></li>
                        </ul>
                    </li>

                    <li><a href="#">📚 KRS</a></li>
                    <li><a href="#">📝 Nilai</a></li>
                    <li><a href="#">⚙️ Pengaturan</a></li>
                    <li><a href="#" class="logout">🚪 Keluar</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h1>Panel Admin</h1>
            </header>

            <section>
                <p>Selamat datang di panel admin. Di sini Anda bisa mengelola data pengguna, akademik, dan sistem.</p>
            </section>

            <div class="container">
              @yield('content')
           </div>
        </main>
    </div>
 

</body>
</html>
