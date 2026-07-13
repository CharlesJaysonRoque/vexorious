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
            --background-color: #1a1a1a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--background-color);
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

        .title-tab {
            padding-top: 50px;
        }

        .divider h3 {
            padding-top: 50px;
            padding-bottom: 20px;
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
            .ImageHighlight {
                height: 300px;
            }
            .OtherImageRoll img {
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

</body>
</html>
