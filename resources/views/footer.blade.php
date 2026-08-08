<style>
    .site-footer {
        background-color: #0d0d0d;
        border-top: 4px solid var(--main-color);
        color: #aaaaaa;
        padding: 50px 20px 30px 20px;
        position: relative;
        z-index: 10;
        box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.7);
    }

    .footer-container {
        max-width: 1150px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 40px;
        text-align: left;
    }

    .footer-brand {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .footer-logo-row {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .footer-logo-img {
        height: 42px;
        width: auto;
        image-rendering: pixelated;
    }

    .footer-brand-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
        text-shadow: 2px 2px 0px #000;
        letter-spacing: 1px;
    }

    .footer-description {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #999999;
        margin: 0;
    }

    .footer-section-title {
        font-size: 1.1rem;
        color: var(--main-color);
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 1px 1px 0px #000;
        margin-top: 0;
        margin-bottom: 16px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .footer-links li a {
        color: #bbbbbb;
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.2s ease, transform 0.2s ease;
        display: inline-block;
    }

    .footer-links li a:hover {
        color: var(--main-color);
        transform: translateX(4px);
    }

    .footer-bottom {
        max-width: 1150px;
        margin: 40px auto 0 auto;
        padding-top: 25px;
        border-top: 1px solid #222222;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 0.85rem;
        color: #777777;
    }

    .mojang-disclaimer {
        font-size: 0.8rem;
        color: #666666;
        margin-top: 8px;
    }

    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <a href="{{ route('home') }}" class="footer-logo-row">
                <img src="{{ asset('images/logo/logo-transparent.png') }}" alt="Vexorious Logo" class="footer-logo-img">
                <span class="footer-brand-title">VEXORIUS SMP</span>
            </a>
            <p class="footer-description">
                A premier Minecraft Bedrock SMP survival server community featuring land protection, community player shops, cross-platform gameplay, and custom world builds.
            </p>
        </div>

        <div>
            <h4 class="footer-section-title">Navigation</h4>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('member') }}">Members</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('rules') }}">Server Rules</a></li>
                <li><a href="{{ route('map') }}">World Map</a></li>
            </ul>
        </div>

        <div>
            <h4 class="footer-section-title">Community</h4>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}#join">Join Server</a></li>
                <li><a href="https://discord.gg" target="_blank" rel="noopener">Discord Server</a></li>
                <li><a href="https://youtube.com" target="_blank" rel="noopener">YouTube Channel</a></li>
                <li><a href="https://tiktok.com" target="_blank" rel="noopener">TikTok Updates</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div>
            <div>&copy; {{ date('Y') }} Vexorious SMP. All rights reserved.</div>
            <div class="mojang-disclaimer">Not an official Minecraft product. Not approved by or associated with Mojang or Microsoft.</div>
        </div>
        <div>
            <span>Server IP: <strong>play.vexorious.com</strong> (Port: 19132)</span>
        </div>
    </div>
</footer>
