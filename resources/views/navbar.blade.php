<style>
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
        position: relative;
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
    .btn-join {
        background-color: var(--main-color);
        color: #ffffff !important;
        padding: 10px 22px;
        border: 3px solid #000000;
        box-shadow: inset -3px -3px 0px #00632c, inset 3px 3px 0px #4dff88;
        text-shadow: 2px 2px 0px #000;
        transform: none !important;
        cursor: pointer;
        transition: all 0.1s ease;
        text-decoration: none;
    }

    .btn-join:hover {
        background-color: #00b350;
        box-shadow: inset -3px -3px 0px #007a37, inset 3px 3px 0px #80ffaa;
        transform: scale(1.05) !important;
    }

    .btn-join:active {
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

    /* Mobile Responsive Styles */
    @media (max-width: 992px) {
        .mobile-toggle {
            display: flex;
            z-index: 10100; /* Ensure button floats on top of sliding sidebar */
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
            right: -280px; /* Hide offscreen right */
            width: 280px;
            height: 100vh;
            background-color: #141414;
            border-left: 4px solid var(--main-color); /* Minecraft green line down the left border */
            box-shadow: -10px 0 40px rgba(0,0,0,0.6);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin: 0;
            padding: 80px 20px 20px 20px; /* Top padding leaves space for hamburger icon alignment */
            list-style: none;
            transition: right 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 10000;
        }

        .nav-links.active {
            right: 0; /* Slide into view */
        }

        .nav-links li {
            width: 100%;
            text-align: center;
        }

        .nav-links li a {
            font-size: 1.25rem;
            padding: 10px 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .nav-links li a.btn-join {
            width: auto;
            margin-top: 10px;
            display: inline-block;
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
</style>

<nav class="navbar">
    <div class="nav-container">
        <a href="/" class="brand-link">
            <img src="{{ asset('images/logo/logo-transparent.png') }}" alt="Vexorius Logo" class="nav-logo">
            <span class="brand-text">VEXORIUS</span>
        </a>

        <button class="mobile-toggle" aria-label="Toggle menu" id="mobileToggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('member') }}">Members</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('rules') }}">Rules</a></li>
            <li><a href="{{ route('map') }}">World Map</a></li>
            <li><a href="{{ route('home') }}#join" class="btn-join">Join Now</a></li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileToggle = document.getElementById('mobileToggle');
        const navLinks = document.getElementById('navLinks');

        if (mobileToggle && navLinks) {
            mobileToggle.addEventListener('click', () => {
                mobileToggle.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
        }
    });
</script>

