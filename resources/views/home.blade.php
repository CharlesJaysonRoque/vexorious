@extends('welcome')

@section('content')
    <style>

        .hero-banner {
            position: relative;
            width: 100%;
            min-height: 85vh;
            background: url('{{ asset('images/sample1.jpg') }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            box-sizing: border-box;
            border-bottom: 4px solid var(--main-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(12, 12, 12, 0.75) 0%, rgba(20, 20, 20, 0.95) 100%);
            z-index: 1;
        }

        .hero-content-split {
            position: relative;
            z-index: 2;
            max-width: 1150px;
            width: 100%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 40px;
            align-items: center;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
            text-align: center;
        }

        .hero-logo-box {
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .logo-lightning-canvas {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 210px;
            height: 210px;
            pointer-events: none;
            z-index: 1;
        }

        .hero-logo {
            position: relative;
            z-index: 2;
            width: 150px;
            height: auto;
            filter: drop-shadow(0 0 18px rgba(0, 152, 68, 0.6));
            animation: heroLogoFloat 4s ease-in-out infinite;
            transition: filter 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .hero-logo:hover {
            filter: drop-shadow(0 0 25px #00ff66) drop-shadow(0 0 45px rgba(0, 255, 102, 0.8));
            transform: scale(1.08) translateY(-4px);
        }

        .hero-logo:active {
            transform: scale(0.95);
        }

        @keyframes heroLogoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .hero-title {
            font-size: 3.4rem;
            color: var(--main-color);
            text-shadow: 4px 4px 0px #000, 0 0 20px rgba(0, 152, 68, 0.4);
            letter-spacing: 2px;
            margin: 0;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #e0e0e0;
            line-height: 1.6;
            text-shadow: 2px 2px 0px #000;
            margin: 0;
            max-width: 600px;
        }

        .hero-badges-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .hero-meta-badge {
            background-color: rgba(20, 20, 20, 0.85);
            border: 2px solid #333;
            color: #ffb700;
            padding: 6px 14px;
            border-radius: 4px;
            font-size: 0.88rem;
            font-weight: bold;
            text-shadow: 1px 1px 0px #000;
        }

        .hero-right-card {
            background-color: #141414;
            border: 4px solid #000;
            border-radius: 12px;
            box-shadow: inset -4px -4px 0px #0a0a0a, inset 4px 4px 0px #2e2e2e, 0 12px 35px rgba(0, 0, 0, 0.8);
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }

        .card-status-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .hero-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            padding: 6px 12px;
            background-color: #222;
            border: 2px solid #000;
            border-radius: 4px;
            text-shadow: 1px 1px 0px #000;
        }

        .hero-status-badge.online {
            color: #00ff66;
            box-shadow: inset -2px -2px 0px #00632c, inset 2px 2px 0px #4dff88;
        }

        .hero-status-badge.offline {
            color: #ff3333;
            box-shadow: inset -2px -2px 0px #7a1f1f, inset 2px 2px 0px #ff8080;
        }

        .hero-player-count {
            font-size: 1.1rem;
            color: #fff;
            font-weight: bold;
            text-shadow: 1.5px 1.5px 0px #000;
        }

        .btn-giant-join {
            background-color: var(--main-color);
            color: #ffffff !important;
            font-family: 'Mojangles', Arial, sans-serif;
            font-size: 1.2rem;
            padding: 14px 28px;
            border: 4px solid #000000;
            box-shadow: inset -4px -4px 0px #005c29, inset 4px 4px 0px #4dff88, 0 6px 15px rgba(0,0,0,0.6);
            text-shadow: 2px 2px 0px #000;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.15s ease;
        }

        .btn-giant-join:hover {
            background-color: #00b350;
            transform: translateY(-2px);
        }

        .hero-ip-box {
            font-family: monospace;
            background: #050505;
            border: 2px solid #333;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: border-color 0.2s;
            user-select: none;
            text-align: center;
        }

        .hero-ip-box:hover {
            border-color: var(--main-color);
        }

        /* SECTION WRAPPERS */
        .section-wrapper {
            position: relative;
            width: 100%;
            padding: 70px 20px;
            box-sizing: border-box;
        }

        .section-inner {
            max-width: 1150px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 2.3rem;
            color: var(--main-color);
            text-shadow: 3px 3px 0px #000;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .section-desc {
            font-size: 1.1rem;
            color: #ccc;
            text-shadow: 1px 1px 0px #000;
            margin: 0;
        }

        /* Theme: Featured Builds Section */
        .theme-builds {
            background: linear-gradient(180deg, rgba(10,10,10,0.85) 0%, rgba(15,15,15,0.92) 100%), url('{{ asset('images/sample3.jpg') }}') center/cover no-repeat;
            border-bottom: 4px solid #000;
        }

        
        .auto-scroll-row {
            display: flex;
            gap: 25px;
            overflow-x: auto;
            padding: 15px 5px 25px 5px;
            scrollbar-width: none; /* Hide scrollbar for seamless look */
            -ms-overflow-style: none;
            cursor: grab;
            user-select: none;
        }

        .auto-scroll-row:active {
            cursor: grabbing;
        }

        .auto-scroll-row::-webkit-scrollbar {
            display: none;
        }

        .build-card-item {
            min-width: 300px;
            max-width: 300px;
            height: 280px;
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 6px 15px rgba(0,0,0,0.6);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            transition: transform 0.2s ease, border-color 0.2s ease;
            cursor: pointer;
            box-sizing: border-box;
        }

        .build-card-item:hover {
            transform: translateY(-5px) scale(1.02);
            border-color: var(--main-color);
        }

        .build-img-box {
            width: 100%;
            height: 170px;
            position: relative;
            overflow: hidden;
            background-color: #000;
            border-bottom: 2px solid #000;
        }

        .build-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .build-card-item:hover .build-img-box img {
            transform: scale(1.08);
        }

        .build-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.65rem;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 3px;
            background-color: rgba(0, 0, 0, 0.85);
            color: #ffb700;
            border: 1px solid #333;
            text-transform: uppercase;
        }

        .build-info-box {
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 106px;
            box-sizing: border-box;
            text-align: left;
        }

        .build-item-title {
            font-size: 1.1rem;
            color: #fff;
            margin: 0;
            text-shadow: 1px 1px 0px #000;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .build-item-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #aaa;
        }

        .builder-head-icon {
            width: 20px;
            height: 20px;
            border-radius: 2px;
            border: 1px solid #000;
            image-rendering: pixelated;
        }

        .theme-wall-of-fame {
            background: linear-gradient(180deg, rgba(15,15,15,0.88) 0%, rgba(20,20,20,0.95) 100%), url('{{ asset('images/sample2.jpg') }}') center/cover no-repeat;
            border-bottom: 4px solid #000;
        }

        .fame-scroll-card {
            min-width: 220px;
            max-width: 220px;
            height: 240px;
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a;
            transition: transform 0.2s ease, border-color 0.2s ease;
            text-decoration: none;
            cursor: pointer;
            box-sizing: border-box;
        }

        .fame-scroll-card:hover {
            transform: translateY(-5px) scale(1.03);
            border-color: var(--main-color);
        }

        .fame-skin-body {
            height: 130px;
            width: auto;
            object-fit: contain;
            image-rendering: pixelated;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.7));
        }

        .fame-name { font-size: 1.1rem; color: #fff; font-weight: bold; margin: 0; text-shadow: 1px 1px 0px #000; }
        .fame-badge { font-size: 0.75rem; padding: 2px 8px; border: 1px solid #000; border-radius: 2px; font-weight: bold; text-transform: uppercase; text-shadow: 1px 1px 0px #000; }
        .role-owner { background-color: #ff3333; color: #fff; }
        .role-co-owner { background-color: #d32f2f; color: #fff; }
        .role-builder { background-color: #00bfff; color: #fff; }

        .join-guide-box {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            padding: 35px 25px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a;
        }

        .guide-steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .guide-step {
            background-color: #0c0c0c;
            border: 2px solid #222;
            border-radius: 6px;
            padding: 20px 15px;
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .grass-banner-footer {
            background-color: #111;
            border-top: 10px solid #009844;
            position: relative;
            padding: 60px 20px;
            text-align: center;
        }

        .grass-banner-footer::before {
            content: '';
            position: absolute;
            top: -16px;
            left: 0;
            right: 0;
            height: 6px;
            background: repeating-linear-gradient(90deg, #009844 0px, #009844 16px, #007333 16px, #007333 32px);
        }

        .toast-copy {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: #009844;
            color: white;
            border: 3px solid #000;
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 0.95rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.7);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
            z-index: 99999;
            text-shadow: 1px 1px 0px #000;
        }

        .toast-copy.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 900px) {
            .hero-content-split { grid-template-columns: 1fr; text-align: center; }
            .hero-left { align-items: center; text-align: center; }
            .hero-title { font-size: 2.5rem; }
        }
    </style>

    <section class="hero-banner">
        <div class="hero-overlay"></div>
        <div class="hero-content-split">
            <!-- Left Side: Centered Logo, Title & Custom Badges -->
            <div class="hero-left">
                <div class="hero-logo-box">
                    <canvas id="logoLightningCanvas" class="logo-lightning-canvas"></canvas>
                    <img src="{{ asset('images/logo/logo-transparent.png') }}" alt="Vexorious Logo" class="hero-logo" title="Vexorious SMP">
                </div>
                <h1 class="hero-title">VEXORIUS SMP</h1>
                <p class="hero-subtitle">An immersive Bedrock survival world where creators and adventurers build legendary empires together.</p>
                <div class="hero-badges-row">
                    <span class="hero-meta-badge">🎮 Bedrock 1.20+</span>
                    <span class="hero-meta-badge">🌲 Pure Vanilla</span>
                    <span class="hero-meta-badge">☕ Chill Players</span>
                </div>
            </div>

            <!-- Right Side: Server Info & Join Card -->
            <div class="hero-right-card">
                <div class="card-status-header">
                    <span class="hero-status-badge offline" id="heroStatusBadge">
                        <span class="pulse-dot"></span>
                        <span id="heroStatusText">Pinging Node...</span>
                    </span>
                    <span class="hero-player-count" id="heroPlayerCount">-- / -- Players</span>
                </div>

                <div style="font-size:0.9rem; color:#888; font-style:italic;" id="heroMotd">Connecting to Bedrock server node...</div>

                <a href="#join" class="btn-giant-join">
                    ⚔️ JOIN SERVER NOW
                </a>

                <div class="hero-ip-box" id="btnHeroCopyIp" title="Click to copy IP address and Port">
                    <span style="font-size:0.75rem; color:#888; display:block; text-transform:uppercase;">Bedrock IP & Port:</span>
                    <span style="color:var(--main-color); font-size:1.15rem; font-weight:bold;">vexs.playwithbao.com : 52673</span>
                </div>
            </div>
        </div>
    </section>

   
    <section class="section-wrapper theme-builds">
        <div class="section-inner">
            <div class="section-header">
                <h2 class="section-title">Featured Creations</h2>
                <p class="section-desc">Click any build card to open the full Creations Gallery!</p>
            </div>

            <!-- Auto-scrolling Row -->
            <div class="auto-scroll-row" id="buildsAutoScroll">
                <a href="{{ route('gallery') }}" class="build-card-item">
                    <div class="build-img-box">
                        <img src="{{ asset('images/sample1.jpg') }}" alt="Skyward Castle">
                        <span class="build-badge">Survival Base</span>
                    </div>
                    <div class="build-info-box">
                        <h3 class="build-item-title">Skyward Castle</h3>
                        <div class="build-item-meta">
                            <div style="display:flex; align-items:center; gap:6px;">
                                <img src="https://mc-heads.net/avatar/Steve/80" class="builder-head-icon" alt="Zaennaaa">
                                <span>Zaennaaa</span>
                            </div>
                            <span style="font-family:monospace; color:#ffb700;">1200 / 78 / -450</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('gallery') }}" class="build-card-item">
                    <div class="build-img-box">
                        <img src="{{ asset('images/sample2.jpg') }}" alt="Iron Foundry">
                        <span class="build-badge">Redstone Farm</span>
                    </div>
                    <div class="build-info-box">
                        <h3 class="build-item-title">Iron Foundry</h3>
                        <div class="build-item-meta">
                            <div style="display:flex; align-items:center; gap:6px;">
                                <img src="https://mc-heads.net/avatar/Steve/80" class="builder-head-icon" alt="meepluf">
                                <span>meepluf</span>
                            </div>
                            <span style="font-family:monospace; color:#ffb700;">450 / 64 / 210</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('gallery') }}" class="build-card-item">
                    <div class="build-img-box">
                        <img src="{{ asset('images/sample3.jpg') }}" alt="Ender Spires">
                        <span class="build-badge">End Base</span>
                    </div>
                    <div class="build-info-box">
                        <h3 class="build-item-title">Ender Spires</h3>
                        <div class="build-item-meta">
                            <div style="display:flex; align-items:center; gap:6px;">
                                <img src="https://mc-heads.net/avatar/NotUzuki/80" class="builder-head-icon" alt="TheDarkLight836">
                                <span>TheDarkLight836</span>
                            </div>
                            <span style="font-family:monospace; color:#ffb700;">2500 / 58 / 0</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('gallery') }}" class="build-card-item">
                    <div class="build-img-box">
                        <img src="{{ asset('images/sample4.jpg') }}" alt="Prismarine Dome">
                        <span class="build-badge">Ocean Base</span>
                    </div>
                    <div class="build-info-box">
                        <h3 class="build-item-title">Prismarine Dome</h3>
                        <div class="build-item-meta">
                            <div style="display:flex; align-items:center; gap:6px;">
                                <img src="https://mc-heads.net/avatar/Steve/80" class="builder-head-icon" alt="Remxz4353">
                                <span>Remxz4353</span>
                            </div>
                            <span style="font-family:monospace; color:#ffb700;">-1800 / 60 / -1200</span>
                        </div>
                    </div>
                </a>
            </div>

            <div style="margin-top:20px; text-align:center;">
                <a href="{{ route('gallery') }}" class="btn-copy-status" style="display:inline-block; text-decoration:none; color:var(--main-color);">Browse All Community Creations &rarr;</a>
            </div>
        </div>
    </section>

    <section class="section-wrapper theme-wall-of-fame">
        <div class="section-inner">
            <div class="section-header">
                <h2 class="section-title">Wall of Fame</h2>
                <p class="section-desc">Click any staff member card to view their profile details!</p>
            </div>

            <!-- Auto-scrolling Row of Member Cards -->
            <div class="auto-scroll-row" id="membersAutoScroll">
                <a href="{{ route('member') }}" class="fame-scroll-card">
                    <img src="https://mc-heads.net/body/NotUzuki/right" alt="TheDarkLight836" class="fame-skin-body">
                    <div>
                        <p class="fame-name">TheDarkLight836</p>
                        <span class="fame-badge role-owner">Owner</span>
                    </div>
                </a>

                <a href="{{ route('member') }}" class="fame-scroll-card" data-xuid="2535447857970948">
                    <img src="https://mc-heads.net/player/Steve/right" alt="Remxz4353" class="fame-skin-body">
                    <div>
                        <p class="fame-name">Remxz4353</p>
                        <span class="fame-badge role-co-owner">Co-Owner</span>
                    </div>
                </a>

                <a href="{{ route('member') }}" class="fame-scroll-card" data-xuid="2535409070019823">
                    <img src="https://mc-heads.net/player/Steve/right" alt="Zaennaaa" class="fame-skin-body">
                    <div>
                        <p class="fame-name">Zaennaaa</p>
                        <span class="fame-badge role-builder">Builder</span>
                    </div>
                </a>

                <a href="{{ route('member') }}" class="fame-scroll-card" data-xuid="2535446737426449">
                    <img src="https://mc-heads.net/player/Steve/right" alt="Scyla001" class="fame-skin-body">
                    <div>
                        <p class="fame-name">Scyla001</p>
                        <span class="fame-badge role-builder">Builder</span>
                    </div>
                </a>

                <a href="{{ route('member') }}" class="fame-scroll-card" data-xuid="2535458463261005">
                    <img src="https://mc-heads.net/player/Steve/right" alt="MehLooowwww" class="fame-skin-body">
                    <div>
                        <p class="fame-name">MehLooowwww</p>
                        <span class="fame-badge role-builder">Builder</span>
                    </div>
                </a>

                <a href="{{ route('member') }}" class="fame-scroll-card" data-xuid="2535426227656452">
                    <img src="https://mc-heads.net/player/Steve/right" alt="meepluf" class="fame-skin-body">
                    <div>
                        <p class="fame-name">meepluf</p>
                        <span class="fame-badge role-builder">Builder</span>
                    </div>
                </a>
            </div>

            <div style="margin-top:20px; text-align:center;">
                <a href="{{ route('member') }}" class="btn-copy-status" style="display:inline-block; text-decoration:none; color:var(--main-color);">View Full Roster of Members &rarr;</a>
            </div>
        </div>
    </section>

    <section class="section-wrapper theme-features" id="join" style="background:#141414;">
        <div class="section-inner">
            <div class="join-guide-box">
                <div class="section-header" style="margin-bottom:20px;">
                    <h2 class="section-title">How to Join Vexorious</h2>
                    <p class="section-desc">Follow these steps to connect on Minecraft Bedrock Edition.</p>
                </div>
                <div class="guide-steps-grid">
                    <div class="guide-step">
                        <span style="font-size:1.8rem; color:var(--main-color); font-weight:bold;">01</span>
                        <h4 style="color:#fff; margin:4px 0;">Open Minecraft</h4>
                        <p style="color:#888; font-size:0.88rem; margin:0;">Launch Minecraft Bedrock Edition on Mobile, PC, or Console.</p>
                    </div>
                    <div class="guide-step">
                        <span style="font-size:1.8rem; color:var(--main-color); font-weight:bold;">02</span>
                        <h4 style="color:#fff; margin:4px 0;">Add Server</h4>
                        <p style="color:#888; font-size:0.88rem; margin:0;">Go to Play &gt; Servers tab, scroll down, and click Add Server.</p>
                    </div>
                    <div class="guide-step">
                        <span style="font-size:1.8rem; color:var(--main-color); font-weight:bold;">03</span>
                        <h4 style="color:#fff; margin:4px 0;">Enter IP & Port</h4>
                        <p style="color:#888; font-size:0.88rem; margin:0;">IP: <strong style="color:var(--main-color);">vexs.playwithbao.com</strong><br>Port: <strong style="color:#ffb700;">52673</strong></p>
                    </div>
                    <div class="guide-step">
                        <span style="font-size:1.8rem; color:var(--main-color); font-weight:bold;">04</span>
                        <h4 style="color:#fff; margin:4px 0;">Save & Join</h4>
                        <p style="color:#888; font-size:0.88rem; margin:0;">Click Save and press Join Server to enter the world!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="grass-banner-footer">
        <h2 style="font-size:2.2rem; color:#fff; text-shadow:3px 3px 0px #000; text-transform:uppercase; margin-bottom:12px;">Become Part of the Legend</h2>
        <p style="font-size:1.15rem; color:#ccc; text-shadow:2px 2px 0px #000; max-width:600px; margin:0 auto 30px;">Join our official Discord community to share build screenshots, apply for builder ranks, and vote on events.</p>
        <a href="https://discord.gg/cz5tdM83w" target="_blank" class="btn-giant-join" style="background-color:#5865F2; box-shadow:inset -4px -4px 0px #3842b5, inset 4px 4px 0px #8892ff;">
            Join Discord Server
        </a>
    </div>

    <!-- Toast Copy Tooltip -->
    <div class="toast-copy" id="copyToast">
        ✔ Server Connection Details Copied to Clipboard!
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnHeroCopyIp = document.getElementById('btnHeroCopyIp');
            const copyToast = document.getElementById('copyToast');
            const heroStatusBadge = document.getElementById('heroStatusBadge');
            const heroStatusText = document.getElementById('heroStatusText');
            const heroPlayerCount = document.getElementById('heroPlayerCount');
            const heroMotd = document.getElementById('heroMotd');

            const serverIp = 'vexs.playwithbao.com';
            const serverPort = '52673';

            // Copy to clipboard
            if (btnHeroCopyIp) {
                btnHeroCopyIp.addEventListener('click', () => {
                    const text = `IP: ${serverIp} | Port: ${serverPort}`;
                    navigator.clipboard.writeText(text).then(() => {
                        if (copyToast) {
                            copyToast.classList.add('show');
                            setTimeout(() => copyToast.classList.remove('show'), 2500);
                        }
                    });
                });
            }

            // Fetch live status
            fetch(`https://api.mcsrvstat.us/bedrock/2/${serverIp}:${serverPort}`)
                .then(res => res.json())
                .then(data => {
                    if (data.online) {
                        if (heroStatusBadge) heroStatusBadge.className = 'hero-status-badge online';
                        if (heroStatusText) heroStatusText.textContent = 'Online';
                        if (heroPlayerCount) heroPlayerCount.textContent = `${data.players.online} / ${data.players.max} Players`;
                        if (heroMotd) heroMotd.textContent = (data.motd && data.motd.clean && data.motd.clean[0]) || 'Vexorious Bedrock Server';
                    } else {
                        if (heroStatusBadge) heroStatusBadge.className = 'hero-status-badge offline';
                        if (heroStatusText) heroStatusText.textContent = 'Offline';
                        if (heroPlayerCount) heroPlayerCount.textContent = '0 / 0 Players';
                        if (heroMotd) heroMotd.textContent = 'Server is currently offline.';
                    }
                })
                .catch(err => {
                    console.warn('Ping error:', err);
                });

        
            function enablePingPongScroll(containerId) {
                const container = document.getElementById(containerId);
                if (!container) return;

                let isHovered = false;
                let isMouseDown = false;
                let startX = 0;
                let scrollLeftStart = 0;
                let draggedDistance = 0;

                let scrollDirection = 1; // 1 = scroll right, -1 = scroll left
                let scrollPos = container.scrollLeft;
                const speed = 0.35;      // Gentle, ultra-smooth speed

                container.addEventListener('mouseenter', () => isHovered = true);
                container.addEventListener('mouseleave', () => {
                    isHovered = false;
                    isMouseDown = false;
                });

                // Mouse Drag-to-Swipe
                container.addEventListener('mousedown', (e) => {
                    isMouseDown = true;
                    startX = e.pageX - container.offsetLeft;
                    scrollLeftStart = container.scrollLeft;
                    draggedDistance = 0;
                });

                container.addEventListener('mousemove', (e) => {
                    if (!isMouseDown) return;
                    e.preventDefault();
                    const x = e.pageX - container.offsetLeft;
                    const walk = (x - startX) * 1.5;
                    draggedDistance = Math.abs(walk);
                    container.scrollLeft = scrollLeftStart - walk;
                    scrollPos = container.scrollLeft;
                });

                container.addEventListener('mouseup', () => {
                    isMouseDown = false;
                });

                // Prevent accidentally navigating when dragging a card
                container.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', (e) => {
                        if (draggedDistance > 8) {
                            e.preventDefault();
                            draggedDistance = 0;
                        }
                    });
                });

                function animate() {
                    if (!isHovered && !isMouseDown) {
                        scrollPos += speed * scrollDirection;
                        container.scrollLeft = scrollPos;

                        const maxScroll = container.scrollWidth - container.clientWidth;
                        if (container.scrollLeft >= maxScroll - 2) {
                            scrollDirection = -1; // Bounce back to left
                            scrollPos = maxScroll - 2;
                        } else if (container.scrollLeft <= 2) {
                            scrollDirection = 1;  // Bounce back to right
                            scrollPos = 2;
                        }
                    } else {
                        // Sync float position when user drags or hovers
                        scrollPos = container.scrollLeft;
                    }
                    requestAnimationFrame(animate);
                }
                requestAnimationFrame(animate);
            }

            enablePingPongScroll('buildsAutoScroll');
            enablePingPongScroll('membersAutoScroll');

            // Dynamically load Bedrock skins using GeyserMC skin textures (matching member.blade.php)
            document.querySelectorAll(".fame-scroll-card[data-xuid]").forEach(card => {
                const xuid = card.dataset.xuid;
                if (!xuid) return;
                const img = card.querySelector(".fame-skin-body");

                fetch(`https://api.geysermc.org/v2/skin/${xuid}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.texture_id && img) {
                            img.src = `https://mc-heads.net/player/${data.texture_id}/right`;
                        }
                    })
                    .catch(err => {
                        console.warn(`Failed to fetch Bedrock skin for XUID ${xuid}:`, err);
                    });
            });

            // Logo Hover Micro-Lightning Arcs & Glow Effect
            const heroLogo = document.querySelector('.hero-logo');
            const logoCanvas = document.getElementById('logoLightningCanvas');

            if (heroLogo && logoCanvas) {
                const ctx = logoCanvas.getContext('2d');
                let animationId = null;

                logoCanvas.width = 210;
                logoCanvas.height = 210;

                function drawMicroLightning() {
                    ctx.clearRect(0, 0, logoCanvas.width, logoCanvas.height);
                    
                    const centerX = logoCanvas.width / 2;
                    const centerY = logoCanvas.height / 2;
                    const radius = 75; // Perimeter radius matching 150px logo

                    // Draw subtle crackling electric arcs around logo border
                    for (let a = 0; a < 3; a++) {
                        const startAngle = Math.random() * Math.PI * 2;
                        const arcLength = 0.5 + Math.random() * 0.7;
                        const endAngle = startAngle + arcLength;

                        ctx.beginPath();
                        const segments = 6;
                        for (let i = 0; i <= segments; i++) {
                            const angle = startAngle + (endAngle - startAngle) * (i / segments);
                            const r = radius + (Math.random() - 0.5) * 16;
                            const x = centerX + Math.cos(angle) * r;
                            const y = centerY + Math.sin(angle) * r;

                            if (i === 0) ctx.moveTo(x, y);
                            else ctx.lineTo(x, y);
                        }

                        ctx.strokeStyle = (Math.random() > 0.35) ? '#00ff66' : '#ffffff';
                        ctx.lineWidth = 1.5 + Math.random() * 1.5;
                        ctx.shadowColor = '#00ff66';
                        ctx.shadowBlur = 10;
                        ctx.stroke();
                    }

                    animationId = requestAnimationFrame(drawMicroLightning);
                }

                heroLogo.addEventListener('mouseenter', () => {
                    if (!animationId) {
                        drawMicroLightning();
                    }
                });

                heroLogo.addEventListener('mouseleave', () => {
                    if (animationId) {
                        cancelAnimationFrame(animationId);
                        animationId = null;
                        ctx.clearRect(0, 0, logoCanvas.width, logoCanvas.height);
                    }
                });
            }
        });
    </script>
@endsection
