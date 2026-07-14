@extends('welcome')

@section('content')
    <style>
        .rules-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Tab buttons Minecraft styled */
        .tab-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background-color: #222;
            color: #ccc;
            font-family: 'Mojangles', Arial, sans-serif;
            font-size: 1rem;
            padding: 12px 24px;
            border: 3px solid #000;
            cursor: pointer;
            box-shadow: inset -3px -3px 0px #111, inset 3px 3px 0px #444;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.1s ease;
            text-shadow: 1px 1px 0px #000;
        }

        .tab-btn:hover {
            color: #fff;
            background-color: #2e2e2e;
        }

        .tab-btn.active {
            color: #fff;
            background-color: var(--main-color);
            box-shadow: inset -3px -3px 0px #00632c, inset 3px 3px 0px #4dff88;
        }

        /* Rules Cards and Accordions */
        .rules-content-pane {
            display: none;
            flex-direction: column;
            gap: 15px;
            animation: fadeIn 0.3s ease;
        }

        .rules-content-pane.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .accordion-item {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 6px;
            box-shadow: inset -2px -2px 0px #0a0a0a, inset 2px 2px 0px #2a2a2a;
            overflow: hidden;
        }

        .accordion-header {
            width: 100%;
            background: none;
            border: none;
            color: #fff;
            font-family: 'Mojangles', Arial, sans-serif;
            font-size: 1.15rem;
            text-align: left;
            padding: 18px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            outline: none;
            text-shadow: 1px 1px 0px #000;
        }

        .accordion-header:hover {
            background-color: #1a1a1a;
        }

        .accordion-icon {
            font-size: 1.25rem;
            color: var(--main-color);
            transition: transform 0.2s ease;
        }

        .accordion-item.active .accordion-icon {
            transform: rotate(45deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #0b0b0b;
        }

        .accordion-content-inner {
            padding: 20px 24px;
            color: #ccc;
            font-size: 1rem;
            line-height: 1.6;
            border-top: 2px solid #000;
        }

        .accordion-content-inner strong {
            color: var(--main-color);
        }

        @media (max-width: 600px) {
            .tab-btn {
                width: 100%;
            }
        }
    </style>

    <div class="rules-wrapper">
        <h1 class="title-tab">Rules</h1>
        <p>Ensure a fair, friendly, and competitive survival environment by following our guidelines.</p>

        <!-- Category Tabs -->
        <div class="tab-container">
            <button class="tab-btn active" data-tab="general-rules">General Rules</button>
            <button class="tab-btn" data-tab="ingame-rules">In-Game Rules</button>
        </div>

        <!-- Tab Content: General Rules -->
        <div class="rules-content-pane active" id="general-rules">
            <div class="accordion-item">
                <button class="accordion-header">
                    <span>1. Respect Everyone in the Community</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        Harassment, hate speech, bullying, and toxic behaviors are strictly prohibited. Treat all builders and survivalists with respect.
                        <br><br>
                        <strong>Severity:</strong> High (Warn / Mute / Ban)
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span>2. Chat Guidelines & No Spamming</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        Keep the chat clean and clear. Avoid spamming capitals, symbols, links, or advertising external servers. Profanity should be kept to a minimum.
                        <br><br>
                        <strong>Severity:</strong> Medium (Warn / Temp-Mute)
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span>3. Keep Discord Safe & Family Friendly</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        Discord channels must follow their designated functions. Do not publish NSFW content, piracy, or malicious code lines. Report players using the support ticketing channel.
                        <br><br>
                        <strong>Severity:</strong> High (Warn / Ban)
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content: In-Game Rules -->
        <div class="rules-content-pane" id="ingame-rules">
            <div class="accordion-item">
                <button class="accordion-header">
                    <span>1. No Griefing or Stealing</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        Do not destroy or modify other players' builds without their permission. Stealing items from players' chests, item frames, or farmland is also completely prohibited.
                        <br><br>
                        <strong>Severity:</strong> Critical (Permanent Ban)
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span>2. No Hacking or Exploits</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        The use of hacked clients (e.g. X-Ray, Fly, Speed, KillAura) or exploiting game glitches (duplication bugs) is strictly banned. Quality of Life mods like OptiFine, Sodium, and Minimaps (without radar) are allowed.
                        <br><br>
                        <strong>Severity:</strong> Critical (Permanent Ban)
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span>3. Respect Claims & Build Distances</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        Avoid building directly next to another player's claim unless you have coordinated with them. Keep a spacing buffer of at least 150 blocks from other major towns or bases.
                        <br><br>
                        <strong>Severity:</strong> Low (Build Relocation / Warn)
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Tab switching logic
            const tabButtons = document.querySelectorAll('.tab-btn');
            const contentPanes = document.querySelectorAll('.rules-content-pane');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabButtons.forEach(b => b.classList.remove('active'));
                    contentPanes.forEach(pane => pane.classList.remove('active'));

                    btn.classList.add('active');
                    const activeTabId = btn.dataset.tab;
                    document.getElementById(activeTabId).classList.add('active');
                });
            });

            // Rule accordion toggles
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const item = this.parentElement;
                    const content = this.nextElementSibling;
                    const isActive = item.classList.contains('active');

                    // Close all active accordions in current panel
                    const currentPanel = item.parentElement;
                    currentPanel.querySelectorAll('.accordion-item').forEach(i => {
                        i.classList.remove('active');
                        i.querySelector('.accordion-content').style.maxHeight = null;
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            });


        });
    </script>
@endsection
