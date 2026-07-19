@extends('welcome')

@section('content')
    <style>
        .top-members {
            display: flex;
            height: 300px;
            padding-right: 20px;
            overflow-x: scroll;
            list-style-type: none;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .top-members li {
            padding-left: 20px;
            display: flex;
            flex-direction: column;
        }

        .top-builds {
            display: flex;
            height: 300px;
            padding-right: 20px;
            overflow-x: scroll;
            list-style-type: none;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .top-builds li {
            padding-left: 20px;
            display: flex;
            flex-direction: column;
        }

        .divider {
            padding-top: 25px;
            padding-bottom: 25px;
            margin: 10px;
            width: 100%;
            background-color: var(--secondary-color);
        }

        .home-member-img {
            width: 150px;
            height: 200px;
            cursor: pointer;
            border-radius: 8px;
            border: 3px solid transparent;
            transition: 0.3s;
        }

        .home-members {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-direction: column;
            height: 550px;
            width: 100%;
            padding-top: 25px;
            padding-bottom: 25px;
            margin: 10px;
        }

        /* Server Status Widget Styling */
        .status-container {
            background-color: #111111;
            border: 3px solid #000;
            border-radius: 6px;
            box-shadow: inset -3px -3px 0px #222, inset 3px 3px 0px #555, 0 6px 20px rgba(0, 0, 0, 0.6);
            margin: 30px auto;
            max-width: 650px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            position: relative;
        }

        .status-info {
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .status-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 5px 10px;
            background-color: #222;
            border: 2px solid #000;
            border-radius: 4px;
            text-shadow: 1px 1px 0px #000;
        }

        .status-badge.online {
            color: #00ff66;
            box-shadow: inset -2px -2px 0px #00632c, inset 2px 2px 0px #4dff88;
        }

        .status-badge.offline {
            color: #ff3333;
            box-shadow: inset -2px -2px 0px #7a1f1f, inset 2px 2px 0px #ff8080;
        }

        .pulse-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: currentColor;
            display: inline-block;
        }

        .pulse-dot.pulsing {
            animation: pulse-glow 1.5s infinite;
        }

        @keyframes pulse-glow {
            0% { transform: scale(0.9); opacity: 0.6; }
            50% { transform: scale(1.1); opacity: 1; box-shadow: 0 0 8px currentColor; }
            100% { transform: scale(0.9); opacity: 0.6; }
        }

        .status-players {
            font-size: 1.1rem;
            color: #ccc;
            text-shadow: 2px 2px 0px #000;
            font-weight: bold;
        }

        .status-motd {
            font-size: 0.95rem;
            color: #888;
            font-style: italic;
            margin-top: 5px;
            max-width: 380px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-shadow: 1px 1px 0px #000;
        }

        .status-copy-card {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .ip-address {
            font-size: 1.15rem;
            font-weight: bold;
            color: var(--main-color);
            background: #000;
            padding: 8px 12px;
            border: 2px solid #333;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
            letter-spacing: 1px;
            text-shadow: 1px 1px 0px #000;
        }

        .ip-address:hover {
            border-color: var(--main-color);
            background-color: #0d0d0d;
        }

        .btn-copy-status {
            font-size: 0.8rem;
            color: #fff;
            background-color: #333;
            border: 2px solid #000;
            padding: 6px 12px;
            cursor: pointer;
            box-shadow: inset -2px -2px 0px #111, inset 2px 2px 0px #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: 'Mojangles', Arial, sans-serif;
            text-shadow: 1px 1px 0px #000;
        }

        .btn-copy-status:active {
            box-shadow: inset 2px 2px 0px #111, inset -2px -2px 0px #555;
        }

        /* Toast Feedback Tooltip */
        .toast-copy {
            position: absolute;
            bottom: -35px;
            right: 20px;
            background: rgba(0, 152, 68, 0.95);
            color: white;
            border: 2px solid #000;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            gap: 6px;
            opacity: 0;
            transform: translateY(-5px);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
            z-index: 100;
            text-shadow: 1px 1px 0px #000;
        }

        .toast-copy.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 600px) {
            .status-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
                margin: 20px 10px;
            }
            .status-info {
                align-items: center;
                text-align: center;
            }
            .status-copy-card {
                align-items: center;
            }
            .toast-copy {
                bottom: auto;
                top: -35px;
                right: 50%;
                transform: translate(50%, 5px);
            }
            .toast-copy.show {
                transform: translate(50%, 0);
            }
        }
    </style>


    <h1 class="title-tab">Welcome to Vexorious</h1>
    <p>Discover the power of Vexorious and unleash your creativity.</p>

    <!-- Server Status Widget -->
    <div class="status-container" id="serverStatusWidget">
        <div class="status-info">
            <div class="status-header">
                <span class="status-badge offline" id="statusBadge">
                    <span class="pulse-dot pulsing"></span>
                    <span id="statusText">Pinging...</span>
                </span>
                <span class="status-players" id="playerCount">-- / -- Players</span>
            </div>
            <div class="status-motd" id="serverMotd">Connecting to Bedrock node...</div>
        </div>
        <div class="status-copy-card">
            <div class="ip-address" id="serverIpBox" title="Click to copy IP and Port">
                <span style="font-size: 0.75rem; color: #888; display: block; font-weight: normal; text-transform: uppercase;">IP Address:</span>
                <span id="displayIp" style="display: block; margin-bottom: 4px;">vexs.playwithbao.com</span>
                <span style="font-size: 0.75rem; color: #888; display: block; font-weight: normal; text-transform: uppercase;">Port:</span>
                <span id="displayPort" style="color: #ffb700;">52673</span>
            </div>
            <button class="btn-copy-status" id="btnCopyIp">Copy Details</button>
        </div>
        <div class="toast-copy" id="copyToast">
            <span style="font-weight: bold;">✔</span> Server Info Copied!
        </div>
    </div>

    <div class="divider">
        <h2>Lore</h2>
        <p>Vexorius is a vibrant community of creators and innovators dedicated to pushing the boundaries of what's possible.</p>
    </div>
    <div class="divider home-members">
        <h2>Gallery</h2>
        <p>Check out some of the amazing creations from our community!</p>
        <ul class="top-builds">
            <li>
                <img class="home-member-img" src="{{ asset('images/sample4.jpg') }}" alt="Build 0">
                Build 0
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Build 1">
                Build 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Build 2">
                Build 2
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample3.jpg') }}" alt="Build 3">
                Build 3
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Build 1">
                Build 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Build 2">
                Build 2
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample3.jpg') }}" alt="Build 3">
                Build 3
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Build 1">
                Build 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Build 2">
                Build 2
            </li>
        </ul>
    </div>



    <div class="divider home-members">
        <h2 class="title-tab">Top Members</h2>
        <p>Check out some of the amazing players from our community!</p>
        <ul class="top-members">
            <li>
                <img class="home-member-img" src="{{ asset('images/sample4.jpg') }}" alt="Member 0">
                Member 0
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Member 1">
                Member 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Member 2">
                Member 2
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample3.jpg') }}" alt="Member 3">
                Member 3
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Member 1">
                Member 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Member 2">
                Member 2
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample3.jpg') }}" alt="Member 3">
                Member 3
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample1.jpg') }}" alt="Member 1">
                Member 1
            </li>
            <li>
                <img class="home-member-img" src="{{ asset('images/sample2.jpg') }}" alt="Member 2">
                Member 2
            </li>
        </ul>
    </div>
    <div class="divider">
        <section id="join" class="join-section">
        <h2>Join Vexorius Today!</h2>
        <p>Sign up now to become a part of our vibrant community of creators and innovators.</p>
        <a class="btn-join" href="https://discord.gg/cz5tdM83w" target="_blank">Discord</a>
    </section>
    </div>

    <script>
        function autoScroll(container) {
            let direction = 1; // 1 = right, -1 = left
            let speed = 1;     // pixels per frame

            function animate() {
                container.scrollLeft += speed * direction;

                if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                    direction = -1; // Go left
                }

                if (container.scrollLeft <= 0) {
                    direction = 1; // Go right
                }

                requestAnimationFrame(animate);
            }

            animate();
        }

        document.querySelectorAll(".top-builds, .top-members").forEach(autoScroll);

        // Server Ping & IP Copy Logic
        (() => {
            const statusBadge = document.getElementById('statusBadge');
            const statusText = document.getElementById('statusText');
            const playerCount = document.getElementById('playerCount');
            const serverMotd = document.getElementById('serverMotd');
            const serverIpBox = document.getElementById('serverIpBox');
            const btnCopyIp = document.getElementById('btnCopyIp');
            const copyToast = document.getElementById('copyToast');

            // CONFIGURATION: Set this to your Minecraft Bedrock server's IP and port
            const serverIp = 'vexs.playwithbao.com';
            const serverPort = '52673';

            // Query public Bedrock MC Status API
            fetch(`https://api.mcsrvstat.us/bedrock/2/${serverIp}:${serverPort}`)
                .then(res => res.json())
                .then(data => {
                    if (data.online) {
                        statusBadge.className = 'status-badge online';
                        statusText.textContent = 'Online';
                        playerCount.textContent = `${data.players.online} / ${data.players.max} Players`;
                        serverMotd.textContent = (data.motd && data.motd.clean && data.motd.clean[0]) || 'Vexorious Bedrock Server';
                    } else {
                        statusBadge.className = 'status-badge offline';
                        statusText.textContent = 'Offline';
                        playerCount.textContent = '0 / 0 Players';
                        serverMotd.textContent = 'Server is currently offline.';
                    }
                })
                .catch(err => {
                    console.warn('API error pinging Bedrock server:', err);
                    statusBadge.className = 'status-badge offline';
                    statusText.textContent = 'Offline';
                    playerCount.textContent = '0 / 0 Players';
                    serverMotd.textContent = 'Connecting to Bedrock node failed.';
                });

            function copyIpAddress() {
                const copyText = `IP: ${serverIp} | Port: ${serverPort}`;
                navigator.clipboard.writeText(copyText).then(() => {
                    if (copyToast) {
                        copyToast.classList.add('show');
                        setTimeout(() => {
                            copyToast.classList.remove('show');
                        }, 2000);
                    }
                });
            }

            if (serverIpBox) serverIpBox.addEventListener('click', copyIpAddress);
            if (btnCopyIp) btnCopyIp.addEventListener('click', copyIpAddress);
        })();
    </script>
@endsection
