@extends('welcome')

@section('content')
    <style>
        .gallery-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: left;
        }

        /* Category Filter Tabs Bar */
        .category-tabs-container {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .tabs-label {
            font-size: 0.8rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Mojangles', Arial, sans-serif;
            text-shadow: 1px 1px 0px #000;
        }

        .gallery-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background-color: #222;
            color: #aaa;
            border: 2px solid #000;
            border-radius: 4px;
            padding: 8px 16px;
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
        .tab-bases.active { background-color: #2e8b57; }
        .tab-farms.active { background-color: #8b0000; }
        .tab-shops.active { background-color: #b8860b; }
        .tab-events.active { background-color: #4b0082; }

        /* Gallery Grid Layout */
        .GalleryGrid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        /* Clean Card Styles (Lightbox Trigger) */
        .MainContainer {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 6px 15px rgba(0,0,0,0.5);
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            box-sizing: border-box;
            cursor: pointer;
            transition: transform 0.2s ease, border-color 0.2s, box-shadow 0.2s;
        }

        .MainContainer:hover {
            transform: translateY(-4px);
            border-color: var(--main-color);
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 8px 25px rgba(0, 152, 68, 0.25);
        }

        /* Card Image Preview */
        .card-image-box {
            width: 100%;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            border-radius: 4px;
            border: 2px solid #000;
            background-color: #050505;
            position: relative;
        }

        .card-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .MainContainer:hover .card-image-box img {
            transform: scale(1.03);
        }

        /* Hover Overlay on Image Box */
        .card-image-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 152, 68, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .MainContainer:hover .card-image-overlay {
            opacity: 1;
        }

        .overlay-icon {
            background-color: #000;
            border: 2px solid #fff;
            border-radius: 50%;
            padding: 8px;
            display: flex;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.6);
        }

        .card-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            text-align: left;
        }

        .card-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .MainContainer h3 {
            margin: 0;
            color: #fff;
            font-size: 1.1rem;
            text-shadow: 1px 1px 0px #000;
            font-family: 'Mojangles', Arial, sans-serif;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .build-badge {
            font-size: 0.6rem;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 2px;
            text-transform: uppercase;
            background-color: #222;
            color: #ffb700;
            border: 1px solid #333;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        /* Builder Row with Player Head */
        .builder-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: #aaa;
        }

        .builder-avatar-icon {
            width: 20px;
            height: 20px;
            border-radius: 2px;
            border: 1.5px solid #000;
            background-color: #222;
            image-rendering: pixelated;
        }

        .card-coords-preview {
            font-family: monospace;
            font-size: 0.8rem;
            color: #ffb700;
            letter-spacing: 0.5px;
        }

        /* --- LIGHTBOX MODAL OVERLAY --- */
        .lightbox-modal {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(10px);
            z-index: 20000;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align start to support scrolling if height overflows */
            padding: 40px 20px;
            overflow-y: auto; /* Enable scroll if height overflows */
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            box-sizing: border-box;
        }

        .lightbox-modal.show {
            opacity: 1;
            pointer-events: auto;
        }

        .lightbox-content {
            background-color: #141414;
            border: 4px solid #000;
            border-radius: 12px;
            box-shadow: inset -4px -4px 0px #0a0a0a, inset 4px 4px 0px #2a2a2a, 0 10px 40px rgba(0,0,0,0.8);
            max-width: 960px;
            width: 100%;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            margin: auto 0; /* Center vertically if space exists, otherwise allow scrolling */
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.15);
            box-sizing: border-box;
        }

        .lightbox-modal.show .lightbox-content {
            transform: scale(1);
        }

        /* Close Button styling - Positioned inside container so it is never cut off */
        .lightbox-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 44px;
            height: 44px;
            background-color: #ff3333;
            color: #fff;
            border: 3px solid #000;
            border-radius: 50%;
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: inset -3px -3px 0px #900, inset 3px 3px 0px #ff8080, 0 4px 12px rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            z-index: 100;
            transition: transform 0.1s ease;
        }

        .lightbox-close-btn:hover {
            transform: scale(1.08);
            background-color: #ff4d4d;
        }

        .lightbox-close-btn:active {
            transform: scale(0.92);
            box-shadow: inset 3px 3px 0px #900, inset -3px -3px 0px #ff8080;
        }

        /* Large Image screen section */
        .lightbox-image-viewer {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: #000;
            border: 3px solid #000;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-main-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.2s ease;
        }

        /* Navigation Arrows on Left and Right */
        .lightbox-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgba(20, 20, 20, 0.85);
            border: 3px solid #000;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset -3px -3px 0px #111, inset 3px 3px 0px #444, 0 4px 10px rgba(0,0,0,0.6);
            transition: all 0.15s ease;
            z-index: 10;
        }

        .lightbox-arrow:hover {
            background-color: var(--main-color);
            box-shadow: inset -3px -3px 0px #005224, inset 3px 3px 0px #4dff88, 0 4px 10px rgba(0,0,0,0.6);
        }

        .lightbox-arrow:active {
            transform: translateY(-50%) scale(0.92);
        }

        .arrow-left { left: 15px; border-radius: 6px 0 0 6px; }
        .arrow-right { right: 15px; border-radius: 0 6px 6px 0; }

        /* Thumbnails list inside modal */
        .lightbox-thumbs {
            display: flex;
            gap: 12px;
            justify-content: center;
            overflow-x: auto;
            padding: 5px 0;
        }

        .lightbox-thumb {
            width: 80px;
            aspect-ratio: 16 / 10;
            object-fit: cover;
            border-radius: 3px;
            border: 2px solid #000;
            cursor: pointer;
            opacity: 0.6;
            transition: all 0.2s;
        }

        .lightbox-thumb:hover {
            opacity: 0.95;
            transform: scale(1.03);
        }

        .lightbox-thumb.active {
            opacity: 1;
            border-color: var(--main-color);
            transform: scale(1.05);
            box-shadow: inset -1px -1px 0px #005224, inset 1px 1px 0px #4dff88;
        }

        /* Description Details inside modal */
        .lightbox-details {
            background-color: #0b0b0b;
            border: 2px solid #222;
            border-radius: 6px;
            padding: 20px;
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .details-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .details-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 0px #000;
            font-family: 'Mojangles', Arial, sans-serif;
        }

        .details-meta-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 15px;
            border-top: 1px solid #222;
            border-bottom: 1px solid #222;
            padding: 12px 0;
        }

        .details-meta-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .details-meta-label {
            font-size: 0.75rem;
            color: #666;
            text-transform: uppercase;
            font-family: 'Mojangles', Arial, sans-serif;
            text-shadow: 1px 1px 0px #000;
        }

        .details-builder-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .details-builder-avatar {
            width: 24px;
            height: 24px;
            border-radius: 3px;
            border: 2px solid #000;
            image-rendering: pixelated;
        }

        .details-coords-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .details-coords-val {
            font-family: monospace;
            color: #ffb700;
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .details-desc {
            font-size: 0.9rem;
            color: #ccc;
            line-height: 1.5;
            margin: 5px 0 0 0;
        }

        .lightbox-action-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 5px;
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
            z-index: 100000;
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

        /* Filtering Transitions */
        .card-fade-in {
            animation: cardFadeIn 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }

        @keyframes cardFadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 800px) {
            .lightbox-close-btn {
                top: 10px;
                right: 10px;
                width: 36px;
                height: 36px;
                font-size: 1.1rem;
            }
            .lightbox-arrow {
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 600px) {
            .lightbox-content {
                padding: 15px;
                gap: 15px;
            }
            .details-title {
                font-size: 1.1rem;
            }
            .details-meta-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .lightbox-thumbs {
                gap: 6px;
            }
            .lightbox-thumb {
                width: 60px;
            }
            .btn-copy-coords {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <div class="gallery-wrapper">
        <h1 class="title-tab">Creations Gallery</h1>
        <p>Browse survival designs, bases, farms, and redstone systems built by the players of Vexorious.</p>

        <!-- Album Category Tabs Bar -->
        <div class="category-tabs-container">
            <span class="tabs-label">Filter Albums</span>
            <div class="gallery-tabs">
                <button class="tab-btn active tab-all" data-filter="all">All</button>
                <button class="tab-btn tab-bases" data-filter="base">Bases</button>
                <button class="tab-btn tab-farms" data-filter="farm">Farms & Redstone</button>
                <button class="tab-btn tab-shops" data-filter="shop">Shops</button>
                <button class="tab-btn tab-events" data-filter="event">Events & Projects</button>
            </div>
        </div>

        <!-- Creations Gallery Grid (Option 3 Clean View) -->
        <div class="GalleryGrid" id="galleryGrid">
            <!-- Dynamically populated via JS to sync index easily -->
        </div>
    </div>

    <!-- --- LIGHTBOX MODAL OVERLAY --- -->
    <div class="lightbox-modal" id="lightboxModal">
        <div class="lightbox-content">
            <button class="lightbox-close-btn" id="btnCloseLightbox" title="Close Overlay">✕</button>
            
            <div class="lightbox-image-viewer">
                <!-- Navigation arrows -->
                <button class="lightbox-arrow arrow-left" id="btnPrevAngle" title="Previous Image">
                    <svg style="width:28px;height:28px;fill:currentColor;" viewBox="0 0 24 24">
                        <path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                    </svg>
                </button>
                
                <img class="lightbox-main-img" id="lightboxMainImg" src="" alt="Showcase Preview">
                
                <button class="lightbox-arrow arrow-right" id="btnNextAngle" title="Next Image">
                    <svg style="width:28px;height:28px;fill:currentColor;" viewBox="0 0 24 24">
                        <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                    </svg>
                </button>
            </div>

            <!-- Clickable thumb list -->
            <div class="lightbox-thumbs" id="lightboxThumbs"></div>

            <!-- Build details -->
            <div class="lightbox-details">
                <div class="details-title-row">
                    <span class="details-title" id="detailsTitle">Build Name</span>
                    <span class="build-badge" id="detailsBadge">Category</span>
                </div>

                <div class="details-meta-grid">
                    <div class="details-meta-item">
                        <span class="details-meta-label">Builder</span>
                        <div class="details-builder-info">
                            <img class="details-builder-avatar" id="detailsAvatar" src="" alt="Head">
                            <span id="detailsBuilder">PlayerName</span>
                        </div>
                    </div>
                    <div class="details-meta-item">
                        <span class="details-meta-label">In-Game Coordinates</span>
                        <div class="details-coords-row">
                            <span class="details-coords-val" id="detailsCoords">X: 0 / Y: 0 / Z: 0</span>
                        </div>
                    </div>
                </div>

                <p class="details-desc" id="detailsDesc">Description goes here.</p>

                <div class="lightbox-action-row">
                    <button class="btn-copy-coords" id="btnCopyExplored" data-coords="0 0 0">Copy /tp Command</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div class="map-toast" id="mapToast">
        <span class="toast-check">✔</span> <span id="toastMessage">Coordinates Copied!</span>
    </div>

    <script>
        // Gallery Database matching member list avatars
        const galleryDb = [
            {
                name: "Skyward Castle",
                album: "base",
                badge: "Survival Base",
                builder: "Zaennaaa",
                builderAvatar: "https://mc-heads.net/avatar/Steve/80", // Will fetch dynamic if custom skin, falls back to Steve
                coords: "1200 78 -450",
                description: "A medieval castle build towering above a custom mountain peak. Features fully detailed interior rooms, dungeon cells, and automated supply basements.",
                images: [
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}"
                ]
            },
            {
                name: "Iron Foundry",
                album: "farm",
                badge: "Redstone Farm",
                builder: "meepluf",
                builderAvatar: "https://mc-heads.net/avatar/Steve/80",
                coords: "450 64 210",
                description: "A high-efficiency iron golem spawning farm disguised inside an industrial factory layout. Yields 400+ iron ingots per hour with automated sorting systems.",
                images: [
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}"
                ]
            },
            {
                name: "Brewing Oasis",
                album: "shop",
                badge: "Player Shop",
                builder: "Scyla001",
                builderAvatar: "https://mc-heads.net/avatar/Steve/80",
                coords: "-310 70 450",
                description: "A potion and brewing shop in the Commercial District. Hand-crafted using spruce wood logs and decorative copper blocks with a cozy garden entry.",
                images: [
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}"
                ]
            },
            {
                name: "Magma Quarry",
                album: "farm",
                badge: "Nether Project",
                builder: "MehLooowwww",
                builderAvatar: "https://mc-heads.net/avatar/Steve/80",
                coords: "12 120 -50",
                description: "A massive chunk quarry dug out at the lava level in the Nether for ancient debris extraction. Highlights safe catwalks and volcanic design pillars.",
                images: [
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}"
                ]
            },
            {
                name: "Ender Spires",
                album: "base",
                badge: "End Base",
                builder: "TheDarkLight836",
                builderAvatar: "https://mc-heads.net/avatar/NotUzuki/80", // Custom avatar based on NotUzuki
                coords: "2500 58 0",
                description: "A futuristic end stone observatory floating in the void. Includes an Elytra launching dock, shulker item sorting bay, and portal links.",
                images: [
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample2.jpg') }}"
                ]
            },
            {
                name: "Prismarine Dome",
                album: "event",
                badge: "Ocean Base",
                builder: "Remxz4353",
                builderAvatar: "https://mc-heads.net/avatar/Steve/80",
                coords: "-1800 60 -1200",
                description: "A glass dome draining an entire Ocean Monument space in survival. Includes underwater glass tunnels, conduits, and tropical fish aquariums.",
                images: [
                    "{{ asset('images/sample2.jpg') }}",
                    "{{ asset('images/sample1.jpg') }}",
                    "{{ asset('images/sample4.jpg') }}",
                    "{{ asset('images/sample3.jpg') }}"
                ]
            }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            const galleryGrid = document.getElementById('galleryGrid');
            const tabBtns = document.querySelectorAll('.tab-btn');
            
            // Modal Elements
            const lightboxModal = document.getElementById('lightboxModal');
            const btnCloseLightbox = document.getElementById('btnCloseLightbox');
            const lightboxMainImg = document.getElementById('lightboxMainImg');
            const lightboxThumbs = document.getElementById('lightboxThumbs');
            const detailsTitle = document.getElementById('detailsTitle');
            const detailsBadge = document.getElementById('detailsBadge');
            const detailsBuilder = document.getElementById('detailsBuilder');
            const detailsAvatar = document.getElementById('detailsAvatar');
            const detailsCoords = document.getElementById('detailsCoords');
            const detailsDesc = document.getElementById('detailsDesc');
            const btnPrevAngle = document.getElementById('btnPrevAngle');
            const btnNextAngle = document.getElementById('btnNextAngle');
            const btnCopyExplored = document.getElementById('btnCopyExplored');
            const mapToast = document.getElementById('mapToast');
            const toastMessage = document.getElementById('toastMessage');

            let activeBuildIndex = 0;
            let activeAngleIndex = 0;
            let activeFilter = 'all';

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

            // --- RENDER GALLERY CARDS ---
            function renderGalleryCards() {
                galleryGrid.innerHTML = '';
                
                galleryDb.forEach((item, index) => {
                    const matchesFilter = activeFilter === 'all' || item.album === activeFilter;

                    if (matchesFilter) {
                        const card = document.createElement('div');
                        card.className = 'MainContainer card-fade-in';
                        card.setAttribute('data-index', index);
                        card.setAttribute('data-album', item.album);

                        // Coords preview X Z
                        const coordsArray = item.coords.split(' ');
                        const coordsPreview = `X: ${coordsArray[0]} Z: ${coordsArray[2]}`;

                        card.innerHTML = `
                            <div class="card-image-box">
                                <img src="${item.images[0]}" alt="${item.name}">
                                <div class="card-image-overlay">
                                    <span class="overlay-icon">
                                        <svg style="width:24px;height:24px;fill:currentColor;" viewBox="0 0 24 24">
                                            <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5M12,9H10V7H9V9H7V10H9V12H10V10H12V9Z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="card-info">
                                <div class="card-header-row">
                                    <h3>${item.name}</h3>
                                    <span class="build-badge">${item.badge}</span>
                                </div>
                                <div class="builder-row">
                                    <img src="${item.builderAvatar}" class="builder-avatar-icon" alt="Head">
                                    <span>Built by: <span class="builder-name">${item.builder}</span></span>
                                </div>
                                <div class="card-coords-preview">
                                    ${coordsPreview}
                                </div>
                            </div>
                        `;

                        card.addEventListener('click', () => {
                            openLightbox(index);
                        });

                        galleryGrid.appendChild(card);
                    }
                });
            }

            // --- FILTER TABS HANDLER ---
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    tabBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    activeFilter = this.dataset.filter;
                    renderGalleryCards();
                });
            });

            // --- LIGHTBOX MODAL CODE ---
            function openLightbox(buildIndex) {
                activeBuildIndex = buildIndex;
                activeAngleIndex = 0;
                
                const buildData = galleryDb[activeBuildIndex];

                // Set Text details
                detailsTitle.textContent = buildData.name;
                detailsBadge.textContent = buildData.badge;
                detailsBuilder.textContent = buildData.builder;
                detailsAvatar.src = buildData.builderAvatar;
                detailsDesc.textContent = buildData.description;

                // Coordinates formatted
                const coordsArray = buildData.coords.split(' ');
                detailsCoords.textContent = `X: ${coordsArray[0]} / Y: ${coordsArray[1]} / Z: ${coordsArray[2]}`;
                btnCopyExplored.setAttribute('data-coords', buildData.coords);

                // Load Angles Display
                updateLightboxImage();

                // Render Thumbnails in lightbox
                lightboxThumbs.innerHTML = '';
                buildData.images.forEach((imgUrl, idx) => {
                    const thumb = document.createElement('img');
                    thumb.src = imgUrl;
                    thumb.className = 'lightbox-thumb';
                    if (idx === 0) thumb.classList.add('active');

                    thumb.addEventListener('click', () => {
                        activeAngleIndex = idx;
                        updateLightboxImage();
                    });
                    
                    lightboxThumbs.appendChild(thumb);
                });

                // Show modal
                lightboxModal.classList.add('show');
                document.body.style.overflow = 'hidden'; // Stop background scrolling
            }

            function closeLightbox() {
                lightboxModal.classList.remove('show');
                document.body.style.overflow = ''; // Re-enable background scrolling
            }

            function updateLightboxImage() {
                const images = galleryDb[activeBuildIndex].images;
                
                // Animate image transition
                lightboxMainImg.style.opacity = 0.4;
                setTimeout(() => {
                    lightboxMainImg.src = images[activeAngleIndex];
                    lightboxMainImg.style.opacity = 1;
                }, 80);

                // Update active thumbnail border
                const thumbs = document.querySelectorAll('.lightbox-thumb');
                thumbs.forEach((t, i) => {
                    if (i === activeAngleIndex) t.classList.add('active');
                    else t.classList.remove('active');
                });
            }

            // Prev / Next navigators
            function prevAngle() {
                const images = galleryDb[activeBuildIndex].images;
                activeAngleIndex = (activeAngleIndex - 1 + images.length) % images.length;
                updateLightboxImage();
            }

            function nextAngle() {
                const images = galleryDb[activeBuildIndex].images;
                activeAngleIndex = (activeAngleIndex + 1) % images.length;
                updateLightboxImage();
            }

            btnPrevAngle.addEventListener('click', prevAngle);
            btnNextAngle.addEventListener('click', nextAngle);
            btnCloseLightbox.addEventListener('click', closeLightbox);

            // Close on click outside modal content container
            lightboxModal.addEventListener('click', (e) => {
                if (e.target === lightboxModal) closeLightbox();
            });

            // Keyboard Bindings
            window.addEventListener('keydown', (e) => {
                if (lightboxModal.classList.contains('show')) {
                    if (e.key === 'ArrowLeft') prevAngle();
                    else if (e.key === 'ArrowRight') nextAngle();
                    else if (e.key === 'Escape') closeLightbox();
                }
            });

            // --- RESOLVE BEDROCK PLAYERS SKINS DYNAMICALLY ---
            // Matches names to xuids defined in member.blade.php
            const membersXuids = {
                "Remxz4353": "2535447857970948",
                "Zaennaaa": "2535409070019823",
                "Scyla001": "2535446737426449",
                "MehLooowwww": "2535458463261005",
                "meepluf": "2535426227656452"
            };

            // Resolve skins
            Object.keys(membersXuids).forEach(name => {
                const xuid = membersXuids[name];
                fetch(`https://api.geysermc.org/v2/skin/${xuid}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.texture_id) {
                            const avatarUrl = `https://mc-heads.net/avatar/${data.texture_id}/80`;
                            
                            // Update matching database items
                            galleryDb.forEach(item => {
                                if (item.builder === name) {
                                    item.builderAvatar = avatarUrl;
                                }
                            });

                            // Re-render grid cards to apply skin head
                            renderGalleryCards();

                            // Update open modal if active
                            if (lightboxModal.classList.contains('show') && detailsBuilder.textContent === name) {
                                detailsAvatar.src = avatarUrl;
                            }
                        }
                    })
                    .catch(err => {
                        console.warn(`Failed to resolve skin for ${name}:`, err);
                    });
            });

            // Initialize Grid
            renderGalleryCards();
        });
    </script>
@endsection
