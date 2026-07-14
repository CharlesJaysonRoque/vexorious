@extends('welcome')

@php
    // CONFIGURATION: Set this to your Minecraft server's Dynmap, BlueMap, or Squaremap URL.
    // Example: $dynmapUrl = 'http://play.vexorious.net:8123/'; 
    // For local PapyrusCS renders: $dynmapUrl = '/map/map.html';
    $dynmapUrl = '/map/map.html'; 
@endphp

@section('content')
    <style>
        /* WALA PANI MA HUMAN*/


        .map-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .map-grid {
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 30px;
            margin-top: 30px;
        }

        /* Card panel styled like Minecraft GUI */
        .map-card {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 6px 20px rgba(0,0,0,0.6);
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .map-card h2 {
            color: var(--main-color);
            margin-top: 0;
            font-size: 1.5rem;
            text-shadow: 2px 2px 0px #000;
            font-family: 'Mojangles', Arial, sans-serif;
            text-transform: uppercase;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
        }

        /* Map Embed container */
        .map-embed-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: #0d0d0d;
            border: 3px solid #000;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.8);
        }

        .map-iframe-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #888;
            font-size: 1.1rem;
            text-align: center;
            background: radial-gradient(circle, #222 0%, #0d0d0d 100%);
            gap: 12px;
            padding: 24px;
        }

        .map-iframe-placeholder svg {
            width: 60px;
            height: 60px;
            fill: currentColor;
        }

        .btn-load-map {
            background-color: var(--main-color);
            color: #fff;
            font-family: 'Mojangles', Arial, sans-serif;
            font-size: 0.9rem;
            padding: 10px 20px;
            border: 3px solid #000;
            cursor: pointer;
            box-shadow: inset -3px -3px 0px #00632c, inset 3px 3px 0px #4dff88;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 0px #000;
            margin-top: 10px;
        }

        .btn-load-map:active {
            box-shadow: inset 3px 3px 0px #00632c, inset -3px -3px 0px #4dff88;
        }

        /* Coordinates list styling */
        .poi-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            overflow-y: auto;
            max-height: 480px;
            padding-right: 5px;
        }

        .poi-item {
            background-color: #0b0b0b;
            border: 2px solid #222;
            border-radius: 4px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            transition: border-color 0.2s;
        }

        .poi-item:hover {
            border-color: var(--main-color);
        }

        .poi-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: left;
        }

        .poi-name {
            font-weight: bold;
            font-size: 1.1rem;
            color: #fff;
            text-shadow: 1px 1px 0px #000;
        }

        .poi-coordinates {
            font-family: monospace;
            font-size: 0.95rem;
            color: #ffb700;
            letter-spacing: 0.5px;
        }

        .dimension-badge {
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 2px;
            font-weight: bold;
            text-transform: uppercase;
            align-self: flex-start;
            border: 1px solid #000;
            text-shadow: 1px 1px 0px #000;
        }

        .dim-overworld {
            background-color: #2e8b57;
            color: #fff;
        }

        .dim-nether {
            background-color: #8b0000;
            color: #fff;
        }

        .dim-end {
            background-color: #4b0082;
            color: #fff;
        }

        .btn-copy-coords {
            background-color: #222;
            color: #ccc;
            border: 2px solid #000;
            padding: 6px 12px;
            cursor: pointer;
            font-size: 0.8rem;
            font-family: 'Mojangles', Arial, sans-serif;
            box-shadow: inset -2px -2px 0px #111, inset 2px 2px 0px #444;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 0px #000;
        }

        .btn-copy-coords:hover {
            color: #fff;
            background-color: #2e2e2e;
        }

        .btn-copy-coords:active {
            box-shadow: inset 2px 2px 0px #111, inset -2px -2px 0px #444;
        }

        /* Dimension Info Banner */
        .border-panel {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .border-card {
            background-color: #111;
            border: 2px solid #222;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }

        .border-title {
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .border-value {
            font-size: 1.25rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 0px #000;
        }

        /* Toast message */
        .map-toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background-color: var(--main-color);
            color: #fff;
            border: 3px solid #000;
            padding: 10px 24px;
            border-radius: 6px;
            font-family: 'Mojangles', Arial, sans-serif;
            box-shadow: 0 8px 24px rgba(0,0,0,0.6);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10000;
            text-shadow: 1px 1px 0px #000;
        }

        .map-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        @media (max-width: 900px) {
            .map-grid {
                grid-template-columns: 1fr;
            }
            .border-panel {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="map-wrapper">
        <h1 class="title-tab">World Map</h1>
        <p>Explore the continents of Vexorious. Locate key communities, spawn hubs, and teleportation gates.</p>

        <div class="map-grid">
            
            <div class="map-card">
                <h2>Live World Map</h2>
                <div class="map-embed-container" id="mapEmbed">
                    @if(!empty($dynmapUrl))
                        <iframe src="{{ $dynmapUrl }}" style="width:100%; height:100%; border:none; image-rendering:pixelated;" title="Dynmap Live Map"></iframe>
                    @else
                        <div class="map-iframe-placeholder" id="iframePlaceholder">
                            <svg viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4M12,18c-3.31,0-6-2.69-6-6c0-1.05 0.27-2.04 0.75-2.9L10.25,14c0.55,0.55 1.45,0.55 2,0l3.5-3.5c0.86,0.48 1.85,0.75 2.9,0.75c0,3.31-2.69,6-6,6Z" />
                            </svg>
                            <span style="font-weight: bold; color: #fff; font-size: 1.2rem; text-shadow: 1px 1px 0px #000;">Interactive Map Setup</span>
                            <span style="font-size: 0.9rem; max-width: 480px; line-height: 1.5; color: #aaa; text-shadow: 1px 1px 0px #000;">
                                To show your real-time world map:
                                <br>
                                1. Install map plugins like <strong>Dynmap</strong>, <strong>BlueMap</strong>, or <strong>Squaremap</strong> on your server.
                                <br>
                                2. Open <code>map.blade.php</code> and set the <code>$dynmapUrl</code> variable at the top of the file to your map web link (e.g. <code>http://your-ip:8123</code>).
                            </span>
                            <button class="btn-load-map" id="btnLoadDemoMap">Try Simulation Preview Map</button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Side: Coordinates Index -->
            <div class="map-card">
                <h2>Point of Interests</h2>
                
                <div class="poi-list">
                    <!-- Spawn -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">Spawn Sanctuary</span>
                            <span class="dimension-badge dim-overworld">Overworld</span>
                            <span class="poi-coordinates">X: 0 / Y: 64 / Z: 0</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="0 64 0">Copy</button>
                    </div>

                    <!-- Shopping District -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">Shopping District</span>
                            <span class="dimension-badge dim-overworld">Overworld</span>
                            <span class="poi-coordinates">X: -250 / Y: 68 / Z: 400</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="-250 68 400">Copy</button>
                    </div>

                    <!-- Nether Hub -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">Central Nether Hub</span>
                            <span class="dimension-badge dim-nether">Nether</span>
                            <span class="poi-coordinates">X: 12 / Y: 120 / Z: -5</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="12 120 -5">Copy</button>
                    </div>

                    <!-- Stronghold -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">End Portal Stronghold</span>
                            <span class="dimension-badge dim-overworld">Overworld</span>
                            <span class="poi-coordinates">X: 1250 / Y: 32 / Z: -880</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="1250 32 -880">Copy</button>
                    </div>

                    <!-- PvP Arena -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">PvP Colosseum</span>
                            <span class="dimension-badge dim-overworld">Overworld</span>
                            <span class="poi-coordinates">X: 500 / Y: 70 / Z: 500</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="500 70 500">Copy</button>
                    </div>

                    <!-- End Gate -->
                    <div class="poi-item">
                        <div class="poi-info">
                            <span class="poi-name">Ender Dragon Island</span>
                            <span class="dimension-badge dim-end">The End</span>
                            <span class="poi-coordinates">X: 0 / Y: 58 / Z: 0</span>
                        </div>
                        <button class="btn-copy-coords" data-coords="0 58 0">Copy</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Border limits banner -->
        <div class="border-panel">
            <div class="border-card">
                <div class="border-title">Overworld Border Limit</div>
                <div class="border-value">20,000 blocks</div>
            </div>
            <div class="border-card">
                <div class="border-title">Nether Border Limit</div>
                <div class="border-value">2,500 blocks</div>
            </div>
            <div class="border-card">
                <div class="border-title">The End Border Limit</div>
                <div class="border-value">Unlimited</div>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div class="map-toast" id="mapToast">
        ✔ Coordinates Copied!
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnLoadDemoMap = document.getElementById('btnLoadDemoMap');
            const mapEmbed = document.getElementById('mapEmbed');
            const mapToast = document.getElementById('mapToast');

            // Simulate loading a live interactive web map on click
            if (btnLoadDemoMap) {
                btnLoadDemoMap.addEventListener('click', () => {
                    // Injecting a beautiful public Dynmap demo iframe
                    mapEmbed.innerHTML = `<iframe src="https://map.wynncraft.com/" style="width:100%; height:100%; border:none; image-rendering:pixelated;" title="Dynmap Live Map"></iframe>`;
                });
            }

            // Coordinates Clipboard copier
            document.querySelectorAll('.btn-copy-coords').forEach(btn => {
                btn.addEventListener('click', function() {
                    const coords = this.dataset.coords;
                    const copyText = `/tp ${coords}`;
                    
                    navigator.clipboard.writeText(copyText).then(() => {
                        if (mapToast) {
                            mapToast.classList.add('show');
                            setTimeout(() => {
                                mapToast.classList.remove('show');
                            }, 2000);
                        }
                    });
                });
            });
        });
    </script>
@endsection
