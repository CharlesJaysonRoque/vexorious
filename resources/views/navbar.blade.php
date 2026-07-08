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
            <li><a href="{{ route('home') }}#join" class="btn-join">Join Now</a></li>
        </ul>
    </div>
</nav>