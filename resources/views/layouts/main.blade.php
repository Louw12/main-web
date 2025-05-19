<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man 2 Kota Kediri</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: transform 0.3s ease;
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
        
        .nav-container {
            width: 90%;
            max-width: 1400px;
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
            height: 70px;
            margin-right: 25px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            margin-bottom: 0;
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
        
        .slider-container {
            width: 100%;
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .slider {
            position: relative;
            width: 100%;
        }
        
        .slide {
            display: none;
            width: 100%;
            position: relative;
        }
        
        .slide.active {
            display: block;
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0.4; }
            to { opacity: 1; }
        }
        
        .slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0;
            display: block;
        }
        
        .slide-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffffff;
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: rgba(10, 37, 80, 0.7);
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }
        
        .slide-content h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            font-weight: 700;
        }
        
        .slide-content p {
            font-size: 1.2rem;
            margin-bottom: 25px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
        }
        
        .btn-slider {
            display: inline-block;
            padding: 12px 30px;
            background-color: #4d96ff;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .btn-slider:hover {
            background-color: transparent;
            color: #ffffff;
            border-color: #4d96ff;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(10, 37, 80, 0.7);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .slider-btn:hover {
            background-color: #0a2550;
        }
        
        .prev-btn {
            left: 20px;
        }
        
        .next-btn {
            right: 20px;
        }
        
        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            z-index: 10;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            margin: 0 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dot:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .dot.active {
            background-color: #4d96ff;
            transform: scale(1.2);
        }
        
        @media (max-width: 768px) {
            .slide-content h2 {
                font-size: 1.8rem;
            }
            
            .slide-content p {
                font-size: 1rem;
                margin-bottom: 15px;
            }
            
            .btn-slider {
                padding: 8px 20px;
                font-size: 0.9rem;
            }
            
            .slider-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .slide-content h2 {
                font-size: 1.5rem;
                margin-bottom: 8px;
            }
            
            .slide-content p {
                font-size: 0.9rem;
                margin-bottom: 10px;
            }
            
            .btn-slider {
                padding: 6px 16px;
                font-size: 0.8rem;
            }
            
            .slider-btn {
                width: 35px;
                height: 35px;
            }
        }
        
        .content {
            flex-grow: 1;
            padding: 30px 0;
        }
        
        .main-container {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }
        
        /* Footer Styles */
        footer {
            background-color: #0a2550;
            color: #e0e0e0;
            padding: 30px 0;
            margin-top: auto;
        }
        
        .footer-container {
            width: 90%;
            max-width: 1400px;
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
        
        /* Dropdown styles */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #0a2550;
            padding: 10px;
            list-style: none;
            border-radius: 5px;
            z-index: 1050;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            min-width: 180px;
        }
        
        .dropdown-menu li {
            margin: 0;
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
        
        @media (min-width: 769px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        }
        
        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }
            
            .nav-links {
                position: fixed;
                left: -100%;
                top: 100px;
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
            
            .footer-container {
                flex-direction: column;
            }
            
            .footer-links {
                margin-top: 15px;
            }
            
            .footer-links a {
                margin: 0 10px;
            }
            
            .dropdown-menu {
                position: static;
                width: 100%;
                box-shadow: none;
                display: none;
                margin-top: 10px;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="scrum">
    </div>
    <nav class="navbar">
        <div class="animated-bg">
            <div class="animated-shape shape1"></div>
            <div class="animated-shape shape2"></div>
            <div class="animated-shape shape3"></div>
            <div class="animated-shape shape4"></div>
        </div>
        <div class="nav-container">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo">
                <div class="logo-text">Man 2 Kota Kediri</div>
            </div>
            
            <ul class="nav-links">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">PPDBM</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Profile</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile 1</a></li>
                        <li><a href="#">Profile 2</a></li>
                        <li><a href="#">Profile 3</a></li>
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
    <div class="slider-container">

        @yield('slider')

    </div>
    <div class="content">
        <div class="main-container">
            @yield('content')
        </div>
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
        
        // Create additional random floating shapes
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
        
        // Dropdown toggle functionality for mobile
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const parent = toggle.parentElement;
                    const dropdownMenu = parent.querySelector('.dropdown-menu');
                    
                    // Close all other dropdown menus
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.style.display = 'none';
                        }
                    });
                    
                    // Toggle current dropdown menu
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
        // Slider functionality
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;
        const totalSlides = slides.length;
        
        // Function to show a specific slide
        function showSlide(n) {
            // Hide all slides
            slides.forEach(slide => {
                slide.classList.remove('active');
            });
            
            // Remove active class from all dots
            dots.forEach(dot => {
                dot.classList.remove('active');
            });
            
            // Set current slide index
            currentSlide = (n + totalSlides) % totalSlides;
            
            // Show the current slide
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }
        
        // Event for next button
        nextBtn.addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });
        
        // Event for previous button
        prevBtn.addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });
        
        // Add click events to dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });
        
        // Auto slide
        let slideInterval = setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);
        
        // Pause auto slide on hover
        const slider = document.querySelector('.slider');
        slider.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        slider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(() => {
                showSlide(currentSlide + 1);
            }, 5000);
        });
    </script>
</body>
</html>