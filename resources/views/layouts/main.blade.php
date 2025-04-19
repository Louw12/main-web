<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man 2 Kota Kediri</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .navbar {
            background-color: #0a2550;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding: 15px 0;
            position: relative;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: transform 0.3s ease;
            /* overflow: hidden; */
        }
        
        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(120deg, rgba(41, 121, 255, 0.1), rgba(21, 101, 192, 0.05));
            z-index: -1;
        }
        
        .animated-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -2;
            overflow: hidden;
        }
        
        .animated-shape {
            position: absolute;
            background-color: rgba(61, 133, 255, 0.2);
            border-radius: 50%;
            animation: float 12s infinite linear;
            filter: blur(2px);

        }
        
        .shape1 {
            width: 100px;
            height: 100px;
            top: -20px;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape2 {
            width: 150px;
            height: 150px;
            top: -50px;
            left: 30%;
            animation-delay: 2s;
        }
        
        .shape3 {
            width: 70px;
            height: 70px;
            top: 20px;
            left: 60%;
            animation-delay: 4s;
        }
        
        .shape4 {
            width: 120px;
            height: 120px;
            top: -30px;
            left: 80%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            50% {
                transform: translateY(80px) rotate(180deg);
                opacity: 0.5;
            }
            100% {
                transform: translateY(0) rotate(360deg);
                opacity: 1;
            }
        }
        
        .navbar.hidden {
            transform: translateY(-100%);
        }
        
        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            position: relative;
            margin-left: 30px;
        }
        
        .nav-links a {
            color: #e0e0e0;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 10px 0;
            display: block;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #4d96ff;
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover {
            color: #ffffff;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .active a {
            color: #ffffff;
        }
        
        .active a::after {
            width: 100%;
            background-color: #4d96ff;
        }
        
        .mobile-toggle {
            display: none;
            cursor: pointer;
        }
        
        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }
        
        .content {
            margin-top: 100px;
            padding: 20px;
            text-align: center;
            flex-grow: 1;
        }
        
        .content h1 {
            margin-bottom: 20px;
            color: #0a2550;
        }
        
        /* Footer Styles */
        footer {
            background-color: #0a2550;
            color: #e0e0e0;
            padding: 30px 0;
            margin-top: auto;
        }
        
        .footer-container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ffffff;
        }
        
        .footer-links {
            display: flex;
        }
        
        .footer-links a {
            color: #e0e0e0;
            text-decoration: none;
            margin-left: 20px;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #4d96ff;
        }
        
        .copyright {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8rem;
            color: #b0b0b0;
        }
        
        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }
            
            .nav-links {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background-color: #0a2550;
                width: 100%;
                text-align: center;
                transition: left 0.3s ease;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
                padding: 20px 0;
            }
            
            .nav-links.active {
                left: 0;
            }
            
            .nav-links li {
                margin: 15px 0;
            }
            
            .nav-links a::after {
                display: none;
            }
            
            .footer-container {
                flex-direction: column;
            }
            
            .footer-links {
                margin-top: 15px;
            }
            
            .footer-links a {
                margin: 0 10px;
            }

            /* Dropdown menu styles */
            .dropdown {
                position: relative; /* Ensure the dropdown is positioned relative to its parent */
    
            }

            .dropdown-menu {
                display: none; /* Default: hide dropdown */
                position: absolute;
                top: 100%; /* Position below the parent */
                left: 0;
                background-color: #0a2550;
                padding: 10px;
                list-style: none;
                border-radius: 5px;
                z-index: 1050; /* Ensure it is above other elements */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .dropdown:hover .dropdown-menu {
                display: block; /* Show dropdown on hover */
            }

            .dropdown-menu li a {
                color: #e0e0e0;
                text-decoration: none;
                display: block;
                padding: 8px 15px;
                border-radius: 3px;
                transition: background-color 0.3s ease;
            }

            .dropdown-menu li a:hover {
                background-color: #1a3a73;
            }

        }
    </style>
</head>
<body>
    <nav class="navbar" style="z-index: 105;">
        <div class="animated-bg">
            <div class="animated-shape shape1"></div>
            <div class="animated-shape shape2"></div>
            <div class="animated-shape shape3"></div>
            <div class="animated-shape shape4"></div>
        </div>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo" style="height: 70px; margin-right: 25px;">
                <div class="logo-text">Man 2 Kota Kediri</div>
            </div>
            
            <ul class="nav-links">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">PPDBM</a></li>
                <li class="dropdown" style="position: relative; z-index: 106;">
                    <a href="#" class="dropdown-toggle" style="color: #e0e0e0; text-decoration: none; padding: 10px 0; display: block;">Profile</a>
                    <ul class="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background-color: #0a2550; padding: 10px; list-style: none; border-radius: 5px; z-index: 107; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                        <li><a href="#" style="color: #e0e0e0; text-decoration: none; display: block; padding: 8px 15px; border-radius: 3px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#1a3a73';" onmouseout="this.style.backgroundColor='transparent';">Profile 1</a></li>
                        <li><a href="#" style="color: #e0e0e0; text-decoration: none; display: block; padding: 8px 15px; border-radius: 3px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#1a3a73';" onmouseout="this.style.backgroundColor='transparent';">Profile 2</a></li>
                        <li><a href="#" style="color: #e0e0e0; text-decoration: none; display: block; padding: 8px 15px; border-radius: 3px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#1a3a73';" onmouseout="this.style.backgroundColor='transparent';">Profile 3</a></li>
                    </ul>
                </li>
                <li><a href="#">Zona Integritas</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            
            <div class="mobile-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>
    
        <div class="content" style="margin-top: 1px; padding: 10px;">
            @yield('content')
        </div>
    
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                Man 2 Kota Kediri
            </div>
            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div class="copyright">
            © 2025 Laragon. All rights reserved.
        </div>
    </footer>
    
    <script>
        // Mobile menu toggle
        const mobileToggle = document.querySelector('.mobile-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });
        
        // Hide navbar on scroll down, show on scroll up
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');
        
        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
            
            lastScrollTop = scrollTop;
        });
        
        // Create additional random floating shapes for more visual interest
        const animatedBg = document.querySelector('.animated-bg');
        
        for (let i = 0; i < 8; i++) {
            const shape = document.createElement('div');
            shape.classList.add('animated-shape');
            
            // Random size between 30px and 80px
            const size = Math.floor(Math.random() * 50) + 30;
            shape.style.width = `${size}px`;
            shape.style.height = `${size}px`;
            
            // Random position
            shape.style.left = `${Math.random() * 100}%`;
            shape.style.top = `${Math.random() * 70 - 20}px`;
            
            // Random animation delay
            shape.style.animationDelay = `${Math.random() * 10}s`;
            
            // Random animation duration
            shape.style.animationDuration = `${Math.random() * 8 + 8}s`;
            
            animatedBg.appendChild(shape);
        }
        // Dropdown toggle functionality
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', (e) => {
            e.preventDefault();
            const isHidden = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '';
            // dropdownMenu.style.display = isHidden ? 'block' : 'none';
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';

            dropdownMenu.style.zIndex = '9999'
        });
    </script>
</body>
</html>