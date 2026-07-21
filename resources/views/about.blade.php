@extends('welcome')

@section('content')
    <style>
        .about-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }

        .about-hero-box {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            padding: 35px 25px;
            margin-bottom: 50px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 8px 25px rgba(0,0,0,0.6);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        .about-logo {
            width: 120px;
            height: auto;
            image-rendering: pixelated;
            filter: drop-shadow(0 0 12px rgba(0, 152, 68, 0.5));
        }

        .about-text {
            font-size: 1.15rem;
            color: #ccc;
            max-width: 750px;
            line-height: 1.7;
            margin: 0;
            text-shadow: 1px 1px 0px #000;
        }

        /* World History Timeline Styles */
        .chronicles-box {
            background: linear-gradient(180deg, #111 0%, #171717 100%);
            border: 3px solid #000;
            border-radius: 8px;
            padding: 40px 30px;
            margin-bottom: 50px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a;
        }

        .timeline-container {
            position: relative;
            margin-top: 35px;
            padding-left: 30px;
            border-left: 4px solid var(--main-color);
            display: flex;
            flex-direction: column;
            gap: 35px;
            text-align: left;
        }

        .timeline-item {
            position: relative;
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            padding: 20px 25px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a;
        }

        .timeline-dot {
            position: absolute;
            left: -49px;
            top: 20px;
            width: 20px;
            height: 20px;
            background-color: var(--main-color);
            border: 3px solid #000;
            border-radius: 50%;
            box-shadow: inset -2px -2px 0px #004d22, inset 2px 2px 0px #4dff88;
        }

        .timeline-era {
            font-size: 0.8rem;
            color: #ffb700;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-title {
            font-size: 1.3rem;
            color: #fff;
            margin: 6px 0;
            text-shadow: 1px 1px 0px #000;
        }

        .timeline-text {
            font-size: 0.95rem;
            color: #aaa;
            line-height: 1.6;
            margin: 0;
        }

        /* Pillars Grid */
        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .pillar-card {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 6px;
            padding: 20px;
            text-align: left;
            box-shadow: inset -2px -2px 0px #0a0a0a, inset 2px 2px 0px #2a2a2a;
        }

        .pillar-icon { font-size: 2.2rem; }
        .pillar-card h3 { color: #fff; margin: 8px 0 4px 0; font-size: 1.15rem; text-shadow: 1px 1px 0px #000; }
        .pillar-card p { color: #aaa; font-size: 0.9rem; margin: 0; line-height: 1.5; }
    </style>

    <div class="about-wrapper">
        <h1 class="title-tab">About Vexorious</h1>
        <p>Discover the history, story, and community vision behind our Minecraft Bedrock SMP world.</p>

        <!-- Intro Mission Box -->
        <div class="about-hero-box">
            <img src="{{ asset('images/logo/logo-transparent.png') }}" alt="Vexorious Logo" class="about-logo">
            <p class="about-text">
                Vexorious is a relaxed, vanilla-focused Minecraft Bedrock SMP server. Built for survivalists, builders, and adventurers who want a friendly place to play without unnecessary clutter, pay-to-win mechanics, or toxic behavior.
            </p>
        </div>

        <!-- World Chronicles Timeline -->
        <div class="chronicles-box">
            <h2 style="font-size:2.2rem; color:var(--main-color); text-shadow:3px 3px 0px #000; text-transform:uppercase; margin:0;">World Chronicles</h2>
            <p style="color:#aaa; font-size:1.05rem; margin:6px 0 0 0;">The history and eras of Vexorious Bedrock SMP.</p>

            <div class="timeline-container">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-era">Era I • The Founding</div>
                    <h3 class="timeline-title">Awakening of Vexorious</h3>
                    <p class="timeline-text">Founded by <strong>TheDarkLight836</strong> and <strong>Remxz4353</strong>, Vexorious started as a vanilla Bedrock survival realm dedicated to peaceful co-existence, exploration, and anti-grief land protection.</p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-era">Era II • Commercial Expansion</div>
                    <h3 class="timeline-title">Commercial District & Trade Hub</h3>
                    <p class="timeline-text">Builders like <strong>Zaennaaa</strong> and <strong>Scyla001</strong> established the central spawn town and Commercial District, allowing survivalists to buy, sell, and trade rare materials and enchantment books.</p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-era">Era III • Redstone & Monuments</div>
                    <h3 class="timeline-title">The Nether Highway & Skyward Builds</h3>
                    <p class="timeline-text">Redstone engineers like <strong>meepluf</strong> and <strong>MehLooowwww</strong> constructed fast-travel Nether ice highways, automated iron foundries, and massive skyward castles floating above mountains.</p>
                </div>
            </div>
        </div>

        <!-- Community Pillars -->
        <div style="margin-bottom: 50px;">
            <h2 style="font-size:2rem; color:var(--main-color); text-shadow:2px 2px 0px #000; text-transform:uppercase; margin-bottom:10px;">Our Core Pillars</h2>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <span class="pillar-icon">🌲</span>
                    <h3>Pure Vanilla</h3>
                    <p>Experience original survival gameplay focused on gathering blocks, building bases, and exploring the wilderness.</p>
                </div>
                <div class="pillar-card">
                    <span class="pillar-icon">☕</span>
                    <h3>Chill Community</h3>
                    <p>Play at your own pace alongside friendly survivalists who respect each other's space and creations.</p>
                </div>
                <div class="pillar-card">
                    <span class="pillar-icon">🎮</span>
                    <h3>Bedrock Access</h3>
                    <p>Easy 1-click connection for mobile, Windows PC, and console players on port 52673.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
