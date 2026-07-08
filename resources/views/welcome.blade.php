<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>

    <style>
        @font-face {
            font-family: 'Mojangles';
            src: url('{{ asset("fonts/Mojangles.otf") }}') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --main-color: #009844;
            --secondary-color: #000000;
            --accent-color: #ffffff;
            --dark-grey: #141414;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--secondary-color);
            font-family: 'Mojangles', Arial, sans-serif;
            color: white;
            text-align: center;
            padding: 0;
            margin: 0;
            overflow-x: hidden;
        }

        /* Custom Scrollbar for Minecraft Theme */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #111;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--main-color);
            border: 2px solid #111;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00b350;
        }

        /* Content Wrapper */
        .content-wrapper {
            padding: 60px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            color: var(--main-color);
            margin-bottom: 12px;
            font-size: 2.8rem;
            text-shadow: 3px 3px 0px #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        p {
            margin-bottom: 40px;
            font-size: 1.25rem;
            color: #ccc;
            text-shadow: 2px 2px 0px #000;
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--dark-grey);
            border-bottom: 4px solid var(--main-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.7);
            height: 80px;
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--accent-color);
            transition: transform 0.2s ease;
        }

        .brand-link:hover {
            transform: scale(1.02);
        }

        .nav-logo {
            height: 52px;
            width: auto;
            object-fit: contain;
            image-rendering: pixelated;
        }

        .brand-text {
            font-size: 1.6rem;
            font-weight: bold;
            color: var(--accent-color);
            text-shadow: 2px 2px 0px #000;
            letter-spacing: 1.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            list-style: none;
        }

        .nav-links li a {
            text-decoration: none;
            color: #bababa;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 2px 2px 0px #000;
            transition: color 0.2s ease, transform 0.2s ease;
            padding: 8px 14px;
            display: inline-block;
        }

        .nav-links li a:hover {
            color: var(--main-color);
            transform: translateY(-2px);
        }

        /* 3D Minecraft Beveled Button for Join Now */
        .nav-links li a.btn-join {
            background-color: var(--main-color);
            color: #ffffff !important;
            padding: 10px 22px;
            border: 3px solid #000000;
            box-shadow: inset -3px -3px 0px #00632c, inset 3px 3px 0px #4dff88;
            text-shadow: 2px 2px 0px #000;
            transform: none !important;
            cursor: pointer;
            transition: all 0.1s ease;
        }

        .nav-links li a.btn-join:hover {
            background-color: #00b350;
            box-shadow: inset -3px -3px 0px #007a37, inset 3px 3px 0px #80ffaa;
            transform: scale(1.05) !important;
        }

        .nav-links li a.btn-join:active {
            transform: scale(0.95) !important;
            box-shadow: inset 3px 3px 0px #00632c, inset -3px -3px 0px #4dff88;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 32px;
            height: 22px;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 1100;
            outline: none;
        }

        .mobile-toggle .bar {
            height: 4px;
            width: 100%;
            background-color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 2px 2px 0px #000;
        }

        /* Gallery Container styling */
        #MainContainer {
            max-width: 900px;
            width: 100%;
            margin: auto;
        }

        /* Main Image */
        #ImageHighlight {
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
        }

        #ImageHighlight img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid var(--main-color);
        }

        /* Thumbnail Roll */
        #OtherImageRoll {
            display: flex;
            justify-content: center;
            gap: 15px;
            overflow-x: auto;
            padding: 10px;
        }

        #OtherImageRoll img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            border: 3px solid transparent;
            transition: 0.3s;
        }

        #OtherImageRoll img:hover {
            transform: scale(1.05);
            border-color: var(--main-color);
        }

        #OtherImageRoll img.active {
            border-color: var(--main-color);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .mobile-toggle {
                display: flex;
            }

            .brand-text {
                font-size: 1.3rem;
            }

            .nav-logo {
                height: 44px;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 75%;
                height: 100vh;
                background-color: rgba(20, 20, 20, 0.96);
                backdrop-filter: blur(12px);
                border-left: 4px solid var(--main-color);
                flex-direction: column;
                justify-content: center;
                gap: 35px;
                transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: -10px 0 40px rgba(0,0,0,0.6);
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li a {
                font-size: 1.25rem;
                padding: 10px 20px;
                width: 100%;
            }

            .nav-links li a.btn-join {
                width: auto;
                margin-top: 10px;
            }

            /* Hamburger animation */
            .mobile-toggle.active .bar:nth-child(1) {
                transform: translateY(9px) rotate(45deg);
            }

            .mobile-toggle.active .bar:nth-child(2) {
                opacity: 0;
            }

            .mobile-toggle.active .bar:nth-child(3) {
                transform: translateY(-9px) rotate(-45deg);
            }
        }

        @media (max-width: 600px) {
            #ImageHighlight {
                height: 300px;
            }
            #OtherImageRoll img {
                width: 100px;
                height: 70px;
            }
            h1 {
                font-size: 2.2rem;
            }
            p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

@include('navbar')

@yield('content')

<script>
    const mainImage = document.getElementById("mainImage");
    const thumbnails = document.querySelectorAll(".thumb");

    thumbnails.forEach((thumb) => {
        thumb.addEventListener("click", () => {
            mainImage.src = thumb.src;
            thumbnails.forEach(t => t.classList.remove("active"));
            thumb.classList.add("active");
        });
    });

    // Mobile Navbar Menu Toggle
    const mobileToggle = document.getElementById("mobileToggle");
    const navLinks = document.getElementById("navLinks");

    mobileToggle.addEventListener("click", () => {
        mobileToggle.classList.toggle("active");
        navLinks.classList.toggle("active");
    });

    // Close mobile menu when clicking a link
    const navItems = document.querySelectorAll(".nav-links a");
    navItems.forEach(item => {
        item.addEventListener("click", () => {
            mobileToggle.classList.remove("active");
            navLinks.classList.remove("active");
        });
    });
</script>

</body>
</html>