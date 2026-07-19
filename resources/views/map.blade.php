@extends('welcome')

@section('content')
    <style>
        .map-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: left;
        }

        .map-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
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
            gap: 20px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* Dimension Glow Classes for Explorer Panel */
        .glow-overworld {
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 0 25px rgba(46, 139, 87, 0.45);
            border-color: #2e8b57;
        }

        .glow-nether {
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 0 25px rgba(139, 0, 0, 0.45);
            border-color: #8b0000;
        }

        .glow-end {
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 0 25px rgba(75, 0, 130, 0.45);
            border-color: #4b0082;
        }

        .map-card h2 {
            color: var(--main-color);
            margin: 0;
            font-size: 1.5rem;
            text-shadow: 2px 2px 0px #000;
            font-family: 'Mojangles', Arial, sans-serif;
            text-transform: uppercase;
            border-bottom: 2px solid #222;
            padding-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Detail Panel Styles */
        .showcase-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .showcase-image-frame {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: #000;
            border: 3px solid #000;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: inset 0 0 15px rgba(0,0,0,0.8);
        }

        .showcase-image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.25s ease-in-out;
        }

        .showcase-thumbnails {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 5px 0;
        }

        .thumb-angle {
            width: 100px;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid #000;
            cursor: pointer;
            box-shadow: inset -1px -1px 0px #111, inset 1px 1px 0px #444;
            transition: transform 0.2s, border-color 0.2s;
            opacity: 0.7;
        }

        .thumb-angle:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .thumb-angle.active {
            border-color: var(--main-color);
            opacity: 1;
            transform: scale(1.05);
            box-shadow: inset -1px -1px 0px #005224, inset 1px 1px 0px #4dff88;
        }

        .landmark-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
            background-color: #0b0b0b;
            border: 2px solid #222;
            border-radius: 6px;
            padding: 20px;
        }

        .landmark-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .landmark-name {
            font-size: 1.4rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 0px #000;
            font-family: 'Mojangles', Arial, sans-serif;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            border-top: 1px solid #222;
            border-bottom: 1px solid #222;
            padding: 12px 0;
            font-size: 0.9rem;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .meta-label {
            color: #666;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: 'Mojangles', Arial, sans-serif;
            text-shadow: 1px 1px 0px #000;
        }

        .meta-value {
            color: #fff;
            font-weight: bold;
        }

        .landmark-coords {
            font-family: monospace;
            color: #ffb700;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        .landmark-description {
            font-size: 0.95rem;
            color: #ccc;
            line-height: 1.5;
        }

        .action-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 5px;
        }

        /* POI Directory Styles */
        .poi-controls {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .search-wrapper {
            position: relative;
            display: flex;
        }

        .search-input {
            width: 100%;
            background-color: #000;
            border: 2px solid #222;
            border-radius: 4px;
            color: #fff;
            padding: 10px 14px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: var(--main-color);
        }

        .dimension-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background-color: #222;
            color: #aaa;
            border: 2px solid #000;
            border-radius: 4px;
            padding: 6px 12px;
            font-family: 'Mojangles', Arial, sans-serif;
            font-size: 0.75rem;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: inset -2px -2px 0px #111, inset 2px 2px 0px #444;
            text-shadow: 1px 1px 0px #000;
            transition: all 0.15s ease;
        }

        .tab-btn:hover {
            color: #fff;
            background-color: #2e2e2e;
        }

        .tab-btn.active {
            color: #fff;
            box-shadow: inset -2px -2px 0px #005224, inset 2px 2px 0px #4dff88;
        }

        .tab-all.active { background-color: #444; box-shadow: inset -2px -2px 0px #222, inset 2px 2px 0px #666; }
        .tab-overworld.active { background-color: #2e8b57; }
        .tab-nether.active { background-color: #8b0000; }
        .tab-end.active { background-color: #4b0082; }

        .poi-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            overflow-y: auto;
            max-height: 520px;
            padding-right: 5px;
        }

        .poi-item {
            background-color: #0b0b0b;
            border: 2px solid #222;
            border-radius: 4px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            cursor: pointer;
            transition: border-color 0.2s, transform 0.15s ease, background-color 0.2s;
        }

        .poi-item:hover {
            border-color: var(--main-color);
            transform: translateX(3px);
            background-color: #111;
        }

        .poi-item.active {
            border-color: var(--main-color);
            background-color: #111;
            box-shadow: inset 0 0 10px rgba(0, 152, 68, 0.15);
        }

        .poi-left {
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
        }

        .poi-list-thumb {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid #000;
            box-shadow: inset -1px -1px 0px #111, inset 1px 1px 0px #444;
        }

        .poi-info-text {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .poi-header {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .poi-name {
            font-weight: bold;
            font-size: 0.95rem;
            color: #fff;
            text-shadow: 1px 1px 0px #000;
        }

        .poi-category {
            font-size: 0.6rem;
            color: #888;
            border: 1px solid #333;
            padding: 0px 4px;
            border-radius: 2px;
            text-transform: uppercase;
        }

        .poi-coord-preview {
            font-family: monospace;
            font-size: 0.8rem;
            color: #ffb700;
        }

        .dimension-badge {
            font-size: 0.65rem;
            padding: 2px 6px;
            border-radius: 2px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #000;
            text-shadow: 1px 1px 0px #000;
        }

        .dim-overworld {
            background-color: #2e8b57;
            color: #fff;
            box-shadow: inset -1px -1px 0px #1c5535, inset 1px 1px 0px #4ade80;
        }

        .dim-nether {
            background-color: #8b0000;
            color: #fff;
            box-shadow: inset -1px -1px 0px #550000, inset 1px 1px 0px #f87171;
        }

        .dim-end {
            background-color: #4b0082;
            color: #fff;
            box-shadow: inset -1px -1px 0px #2e0052, inset 1px 1px 0px #c084fc;
        }

        .btn-copy-coords {
            background-color: #222;
            color: #ccc;
            border: 2px solid #000;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 0.85rem;
            font-family: 'Mojangles', Arial, sans-serif;
            box-shadow: inset -2px -2px 0px #111, inset 2px 2px 0px #444;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 0px #000;
            transition: all 0.1s ease;
        }

        .btn-copy-coords:hover {
            color: #fff;
            background-color: #2e2e2e;
        }

        .btn-copy-coords:active {
            box-shadow: inset 2px 2px 0px #111, inset -2px -2px 0px #444;
        }

        /* Dimension info cards */
        .border-panel {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .border-card {
            background-color: #111;
            border: 2px solid #222;
            padding: 20px;
            border-radius: 6px;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 8px;
            transition: border-color 0.2s;
        }

        .border-card:hover {
            border-color: #333;
        }

        .border-title {
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #888;
            letter-spacing: 0.5px;
            font-family: 'Mojangles', Arial, sans-serif;
            text-shadow: 1px 1px 0px #000;
        }

        .border-value {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 0px #000;
        }

        .border-desc {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.4;
        }

        /* Fade animation trigger */
        .fade-in {
            animation: fadeInEff 0.3s ease;
        }

        @keyframes fadeInEff {
            from { opacity: 0.4; transform: translateY(2px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Toast notification */
        .map-toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background-color: #222;
            color: #fff;
            border: 3px solid #000;
            padding: 12px 24px;
            border-radius: 6px;
            font-family: 'Mojangles', Arial, sans-serif;
            box-shadow: inset -3px -3px 0px #111, inset 3px 3px 0px #444, 0 8px 24px rgba(0,0,0,0.6);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10000;
            text-shadow: 1px 1px 0px #000;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .map-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        .toast-check {
            color: var(--main-color);
            font-weight: bold;
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
        <h1 class="title-tab">Survival Travel Guide</h1>
        <p>Browse key points of interest, dimensions, and coordinates of the Vexorious community.</p>

        <div class="map-grid">
            
            <!-- Left Side: Landmark Explorer Detail Panel -->
            <div class="map-card" id="explorerCard">
                <h2>
                    <svg style="width:24px;height:24px;fill:currentColor;" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4M12,18c-3.31,0-6-2.69-6-6c0-1.05 0.27-2.04 0.75-2.9L10.25,14c0.55,0.55 1.45,0.55 2,0l3.5-3.5c0.86,0.48 1.85,0.75 2.9,0.75c0,3.31-2.69,6-6,6Z" />
                    </svg>
                    Build Showcase
                </h2>
                
                <div class="showcase-container fade-in" id="showcaseContainer">
                    <!-- Showcase Image Screen -->
                    <div class="showcase-image-frame">
                        <img id="showcaseMainImg" src="{{ asset('images/sample1.jpg') }}" alt="Build Screenshot">
                    </div>

                    <!-- Angles / Thumbnails selector -->
                    <div class="showcase-thumbnails" id="showcaseThumbnails">
                        <!-- Clickable thumbnails go here via JS -->
                    </div>

                    <!-- Details Card -->
                    <div class="landmark-info">
                        <div class="landmark-title-row">
                            <span class="landmark-name" id="landmarkName">Spawn Sanctuary</span>
                            <span class="dimension-badge" id="landmarkDimBadge">Overworld</span>
                        </div>

                        <div class="meta-grid">
                            <div class="meta-item">
                                <span class="meta-label">Coordinates</span>
                                <span class="meta-value landmark-coords" id="landmarkCoords">X: 0 / Y: 64 / Z: 0</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Builder/Origin</span>
                                <span class="meta-value" id="landmarkBuilder">Server Admins</span>
                            </div>
                        </div>

                        <p class="landmark-description" id="landmarkDesc">
                            The initial arrival zone for all players. Safe zone from monsters featuring rules guidelines, starter farms, and player greetings.
                        </p>

                        <div class="action-row">
                            <button class="btn-copy-coords" id="btnCopyExplored" data-coords="0 64 0">Copy /tp Command</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Coordinates & Build Explorer List -->
            <div class="map-card">
                <h2>
                    <svg style="width:24px;height:24px;fill:currentColor;" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22S19 14.25 19 9C19 5.13 15.87 2 12 2M12 11.5C10.62 11.5 9.5 10.38 9.5 9S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5Z" />
                    </svg>
                    Landmarks Index
                </h2>

                <div class="poi-controls">
                    <div class="search-wrapper">
                        <input type="text" id="poiSearch" class="search-input" placeholder="Search waypoints by name or coords...">
                    </div>
                    <div class="dimension-tabs">
                        <button class="tab-btn active tab-all" data-filter="all">All</button>
                        <button class="tab-btn tab-overworld" data-filter="overworld">Overworld</button>
                        <button class="tab-btn tab-nether" data-filter="nether">Nether</button>
                        <button class="tab-btn tab-end" data-filter="end">The End</button>
                    </div>
                </div>
                
                <div class="poi-list" id="poiList">
                    <!-- Javascript will dynamically render items here to keep data mapping clean -->
                </div>
            </div>

        </div>

        <!-- Border limits banner -->
        <div class="border-panel">
            <div class="border-card">
                <div class="border-title">Overworld Limits</div>
                <div class="border-value">20,000 blocks</div>
                <div class="border-desc">A border barrier is set at 20k to optimize chunk generation.</div>
            </div>
            <div class="border-card">
                <div class="border-title">Nether Limits</div>
                <div class="border-value">2,500 blocks</div>
                <div class="border-desc">Perfectly matches the 1:8 conversion ratio of the Overworld.</div>
            </div>
            <div class="border-card">
                <div class="border-title">The End Limits</div>
                <div class="border-value">Unlimited</div>
                <div class="border-desc">Explore end cities and hunt for Elytras freely without boundaries.</div>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div class="map-toast" id="mapToast">
        <span class="toast-check">✔</span> <span id="toastMessage">Coordinates Copied!</span>
    </div>

    <script>
        // Database of landmarks, support for multiple images
        const landmarksDb = [
            {
                id: "spawn-sanctuary",
                name: "Spawn Sanctuary",
                category: "Spawn",
                dimension: "overworld",
                coords: "0 64 0",
                builder: "Server Admins",
                description: "The initial arrival zone for all players. Safe zone from monsters featuring rules guidelines, starter survival crops, and welcome messages.",
                images: [
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}"
                ]
            },
            {
                id: "shopping-district",
                name: "Shopping District",
                category: "Shops",
                dimension: "overworld",
                coords: "-250 68 400",
                builder: "Community Builders",
                description: "The commercial trade center of Vexorious. Purchase supplies, tools, custom enchanted books, and blocks from player-operated shops using diamonds.",
                images: [
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}"
                ]
            },
            {
                id: "nether-hub",
                name: "Central Nether Hub",
                category: "Transport",
                dimension: "nether",
                coords: "12 120 -5",
                builder: "Admins & Redstoners",
                description: "The portal connectivity network of Vexorious. Safe ice-boat tracks and tunnel lines link Spawn to distant communities and bases.",
                images: [
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}"
                ]
            },
            {
                id: "end-portal",
                name: "End Portal Stronghold",
                category: "Portal",
                dimension: "overworld",
                coords: "1250 32 -880",
                builder: "World Seed",
                description: "The underground fortress housing the End Portal frame. Maintained with secure stairwells and safety lights for portal activation.",
                images: [
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}"
                ]
            },
            {
                id: "pvp-arena",
                name: "PvP Colosseum",
                category: "PvP",
                dimension: "overworld",
                coords: "500 70 500",
                builder: "Events Committee",
                description: "A huge arena for custom gladiator matches, server wide tournaments, and secure player versus player duels.",
                images: [
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}"
                ]
            },
            {
                id: "end-island",
                name: "Ender Dragon Island",
                category: "The End",
                dimension: "end",
                coords: "0 58 0",
                builder: "Void Origin",
                description: "The obsidian pillars dimension. Contains main portals linking to the outer islands for Elytra and Shulker box collection.",
                images: [
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}"
                ]
            }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            const explorerCard = document.getElementById('explorerCard');
            const showcaseContainer = document.getElementById('showcaseContainer');
            const showcaseMainImg = document.getElementById('showcaseMainImg');
            const showcaseThumbnails = document.getElementById('showcaseThumbnails');
            const landmarkName = document.getElementById('landmarkName');
            const landmarkDimBadge = document.getElementById('landmarkDimBadge');
            const landmarkCoords = document.getElementById('landmarkCoords');
            const landmarkBuilder = document.getElementById('landmarkBuilder');
            const landmarkDesc = document.getElementById('landmarkDesc');
            const btnCopyExplored = document.getElementById('btnCopyExplored');
            const poiList = document.getElementById('poiList');
            const poiSearch = document.getElementById('poiSearch');
            const tabBtns = document.querySelectorAll('.tab-btn');
            const mapToast = document.getElementById('mapToast');
            const toastMessage = document.getElementById('toastMessage');

            let activeLandmarkId = landmarksDb[0].id;
            let activeFilter = 'all';
            let searchQuery = '';

            function showToast(message) {
                if (mapToast) {
                    toastMessage.textContent = message;
                    mapToast.classList.add('show');
                    setTimeout(() => {
                        mapToast.classList.remove('show');
                    }, 2000);
                }
            }

            // Copy Action
            btnCopyExplored.addEventListener('click', () => {
                const coords = btnCopyExplored.getAttribute('data-coords');
                const copyText = `/tp ${coords}`;
                navigator.clipboard.writeText(copyText).then(() => {
                    showToast(`Copied command: ${copyText}`);
                });
            });

            // Update Left Showcase Panel
            function updateShowcase(landmark) {
                // Apply fade-in animation trigger
                showcaseContainer.classList.remove('fade-in');
                void showcaseContainer.offsetWidth; // Trigger reflow
                showcaseContainer.classList.add('fade-in');

                // Update Dimension Glow
                explorerCard.classList.remove('glow-overworld', 'glow-nether', 'glow-end');
                if (landmark.dimension === 'overworld') explorerCard.classList.add('glow-overworld');
                else if (landmark.dimension === 'nether') explorerCard.classList.add('glow-nether');
                else if (landmark.dimension === 'end') explorerCard.classList.add('glow-end');

                // Update details
                landmarkName.textContent = landmark.name;
                landmarkBuilder.textContent = landmark.builder;
                landmarkDesc.textContent = landmark.description;
                
                // Coordinates display
                const coordsArray = landmark.coords.split(' ');
                let coordsText = `X: ${coordsArray[0]} / Y: ${coordsArray[1]} / Z: ${coordsArray[2]}`;
                landmarkCoords.textContent = coordsText;
                btnCopyExplored.setAttribute('data-coords', landmark.coords);

                // Dimension badge text & style
                landmarkDimBadge.textContent = landmark.dimension === 'end' ? 'The End' : landmark.dimension;
                landmarkDimBadge.className = 'dimension-badge';
                landmarkDimBadge.classList.add(`dim-${landmark.dimension}`);

                // Main Image
                showcaseMainImg.src = landmark.images[0];

                // Thumbnails rendering
                showcaseThumbnails.innerHTML = '';
                if (landmark.images.length > 1) {
                    landmark.images.forEach((imgUrl, index) => {
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        img.className = 'thumb-angle';
                        if (index === 0) img.classList.add('active');
                        
                        img.addEventListener('click', () => {
                            // Update active thumbnail
                            document.querySelectorAll('.thumb-angle').forEach(t => t.classList.remove('active'));
                            img.classList.add('active');
                            // Swap main showcase image
                            showcaseMainImg.src = imgUrl;
                        });
                        showcaseThumbnails.appendChild(img);
                    });
                }
            }

            // Render POI Sidebar Items
            function renderSidebarList() {
                poiList.innerHTML = '';
                
                landmarksDb.forEach(landmark => {
                    const matchesFilter = activeFilter === 'all' || landmark.dimension === activeFilter;
                    const matchesSearch = landmark.name.toLowerCase().includes(searchQuery) || landmark.category.toLowerCase().includes(searchQuery);

                    if (matchesFilter && matchesSearch) {
                        const item = document.createElement('div');
                        item.className = 'poi-item';
                        if (landmark.id === activeLandmarkId) item.classList.add('active');

                        const coordsArray = landmark.coords.split(' ');
                        const coordsPreview = `X: ${coordsArray[0]} Z: ${coordsArray[2]}`;

                        item.innerHTML = `
                            <div class="poi-left">
                                <img src="${landmark.images[0]}" class="poi-list-thumb" alt="Mini">
                                <div class="poi-info-text">
                                    <div class="poi-header">
                                        <span class="poi-name">${landmark.name}</span>
                                        <span class="poi-category">${landmark.category}</span>
                                    </div>
                                    <span class="poi-coord-preview">${coordsPreview}</span>
                                </div>
                            </div>
                            <span class="dimension-badge dim-${landmark.dimension}">${landmark.dimension === 'end' ? 'End' : landmark.dimension}</span>
                        `;

                        item.addEventListener('click', () => {
                            activeLandmarkId = landmark.id;
                            // Update selection borders on sidebar
                            document.querySelectorAll('.poi-item').forEach(i => i.classList.remove('active'));
                            item.classList.add('active');

                            updateShowcase(landmark);
                        });

                        poiList.appendChild(item);
                    }
                });
            }

            // Filter Search Handler
            poiSearch.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase();
                renderSidebarList();
            });

            // Dimension Tabs Click Handler
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    tabBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    activeFilter = this.dataset.filter;
                    renderSidebarList();
                });
            });

            // Initialize default active state
            updateShowcase(landmarksDb[0]);
            renderSidebarList();
        });
    </script>
@endsection
