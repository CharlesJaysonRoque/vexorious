@extends('welcome')

@php
    $members = [
        [
            'name' => 'TheDarkLight836',
            'role' => 'Owner',
            'roleClass' => 'role-owner',
            'status' => 'Server Owner',
            'avatar' => 'https://mc-heads.net/avatar/NotUzuki/80',
            'body' => 'https://mc-heads.net/body/NotUzuki/right',
            'desc' => 'Owner and founding father of the Vexorious Bedrock community.'
        ],
        [
            'name' => 'Remxz4353',
            'role' => 'Co-Owner',
            'roleClass' => 'role-co-owner',
            'status' => 'Server Co-Owner',
            'xuid' => '2535447857970948',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Co-owner of Vexorious. Manages the server configuration and handles community operations.'
        ],
        [
            'name' => 'Zaennaaa',
            'role' => 'Builder',
            'roleClass' => 'role-builder',
            'status' => 'Server Builder',
            'xuid' => '2535409070019823',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Specializes in medieval castles, terrain designs, and spawn infrastructure.'
        ],
        [
            'name' => 'Scyla001',
            'role' => 'Builder',
            'roleClass' => 'role-builder',
            'status' => 'Server Builder',
            'xuid' => '2535446737426449',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Talented builder focused on detailing interior designs and player towns.'
        ],
        [
            'name' => 'MehLooowwww',
            'role' => 'Builder',
            'roleClass' => 'role-builder',
            'status' => 'Server Builder',
            'xuid' => '2535458463261005',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Experienced architect designing survival structures and custom dimensions.'
        ],
        [
            'name' => 'meepluf',
            'role' => 'Builder',
            'roleClass' => 'role-builder',
            'status' => 'Server Builder',
            'xuid' => '2535426227656452',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Builds community arenas, shopping hubs, and nether fast-travel systems.'
        ],
        [
            'name' => 'POTATOCHIPS2992',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535430523434803',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Active community member exploring the far lands of Vexorious.'
        ],
        [
            'name' => 'CONQUEROR 1760',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535432496480890',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Active survival player and redstone engineer.'
        ],
        [
            'name' => 'EasedHalo2001',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535460179084892',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Survival adventurer exploring deep caverns and mining diamonds.'
        ],
        [
            'name' => 'Ksmikutqq',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/Ksmikutqq/80',
            'body' => 'https://mc-heads.net/body/Ksmikutqq/right',
            'desc' => 'Vexorious community block builder.'
        ],
        [
            'name' => 'kaizen5327',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535471350813686',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Active survival explorer and resource gatherer.'
        ],
        [
            'name' => 'AJ52862',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/AJ52862/80',
            'body' => 'https://mc-heads.net/body/AJ52862/right',
            'desc' => 'Survival player exploring caves and bases.'
        ],
        [
            'name' => 'nathanbuldog207',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535421437814157',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Community member and town planner.'
        ],
        [
            'name' => 'xSeyanuhhhh',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535470343633783',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Enjoys survival farming and building community structures.'
        ],
        [
            'name' => 'Noahs Ark7512',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535468935859863',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Bedrock explorer gathering blocks and details.'
        ],
        [
            'name' => 'StanMMIV',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/StanMMIV/80',
            'body' => 'https://mc-heads.net/body/StanMMIV/right',
            'desc' => 'Minecraft vanilla enthusiast.'
        ],
        [
            'name' => 'Itsukiiiinakano',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/Itsukiiiinakano/80',
            'body' => 'https://mc-heads.net/body/Itsukiiiinakano/right',
            'desc' => 'Active community farmer and builder.'
        ],
        [
            'name' => 'LunaVale2539',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535419066527709',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Survivalist dedicated to resource gathering and mob farming.'
        ],
        [
            'name' => 'LunaVenecia',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535453749529089',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Active builder helping other survival players design houses.'
        ],
        [
            'name' => 'ZQSenpaii',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/ZQSenpaii/80',
            'body' => 'https://mc-heads.net/body/ZQSenpaii/right',
            'desc' => 'Enjoys mapping regions and organizing chests.'
        ],
        [
            'name' => 'TheVinMiner',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/TheVinMiner/80',
            'body' => 'https://mc-heads.net/body/TheVinMiner/right',
            'desc' => 'Underground miner exploring diamonds and redstone lines.'
        ],
        [
            'name' => 'TheDarkUzuki',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535407396410198',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Active community builder and farmer.'
        ],
        [
            'name' => 'Nox MOSHSEN',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/Nox_MOSHSEN/80',
            'body' => 'https://mc-heads.net/body/Nox_MOSHSEN/right',
            'desc' => 'Dedicated survivalist builder.'
        ],
        [
            'name' => 'Hyddddeeeee',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/Hyddddeeeee/80',
            'body' => 'https://mc-heads.net/body/Hyddddeeeee/right',
            'desc' => 'Survivalist explorer.'
        ],
        [
            'name' => 'eley hahaha',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535447172677261',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Vanilla bedrock survival explorer.'
        ],
        [
            'name' => 'milkshake6759',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535445144499251',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Community survival player.'
        ],
        [
            'name' => 'R0nwhere',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/R0nwhere/80',
            'body' => 'https://mc-heads.net/body/R0nwhere/right',
            'desc' => 'Enjoys redstone builds and farming.'
        ],
        [
            'name' => 'MOSH7222',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535430578606999',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Bedrock builder exploring nether tunnels.'
        ],
        [
            'name' => 'BoraQTI',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'avatar' => 'https://mc-heads.net/avatar/BoraQTI/80',
            'body' => 'https://mc-heads.net/body/BoraQTI/right',
            'desc' => 'Active community helper.'
        ],
        [
            'name' => 'El Krazya',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535440865456406',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Enjoys custom map challenges and survival farms.'
        ],
        [
            'name' => 'MN LightDark',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535465032729265',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Dedicated builder exploring tunnels and mines.'
        ],
        [
            'name' => 'Kyyyrooo',
            'role' => 'Member',
            'roleClass' => 'role-member',
            'status' => 'Survivalist',
            'xuid' => '2535420744603952',
            'avatar' => 'https://mc-heads.net/avatar/Steve/80',
            'body' => 'https://mc-heads.net/player/Steve/right',
            'desc' => 'Survivalist builder creating decorative bases.'
        ],
    ];
@endphp

@section('content')
    <style>
        /* Search bar styling */
        .search-bar-container {
            max-width: 600px;
            margin: 0 auto 30px;
            padding: 0 20px;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            font-family: 'Mojangles', Arial, sans-serif;
            background-color: #111;
            border: 3px solid #000;
            color: #fff;
            border-radius: 6px;
            box-shadow: inset -3px -3px 0px #222, inset 3px 3px 0px #555;
            outline: none;
            font-size: 1.1rem;
            text-align: center;
            letter-spacing: 1px;
            text-shadow: 1px 1px 0px #000;
        }

        .search-input:focus {
            border-color: var(--main-color);
        }

        /* Member Grid improvements */
        .member-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .member {
            background-color: #141414;
            border: 3px solid #000;
            border-radius: 8px;
            box-shadow: inset -3px -3px 0px #0a0a0a, inset 3px 3px 0px #2a2a2a, 0 6px 15px rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            padding: 20px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .member:hover {
            transform: translateY(-4px);
            border-color: var(--main-color);
        }

        .member-image {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border: 3px solid #000;
            border-radius: 4px;
            background-color: #222;
            image-rendering: pixelated;
        }

        .member-info {
            display: flex;
            flex-direction: column;
            text-align: left;
            padding-left: 20px;
            gap: 4px;
            width: calc(100% - 80px);
        }

        .member-name-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap; /* Allows role badges to wrap onto a new line if name is very long */
            gap: 6px 10px;
        }

        .member-name {
            margin: 0;
            font-size: 1.15rem; /* Adjusted down slightly to accommodate long usernames */
            font-weight: bold;
            text-shadow: 1px 1px 0px #000;
            word-break: break-word; /* Wraps long names cleanly */
        }

        /* Minecraft Styled Role Badges */
        .role-badge {
            font-size: 0.75rem;
            padding: 2px 8px;
            border: 1px solid #000;
            border-radius: 2px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 1px 1px 0px #000;
        }

        .role-owner {
            background-color: #ff3333;
            color: #fff;
            box-shadow: inset -1px -1px 0px #900, inset 1px 1px 0px #ff8080;
        }

        .role-co-owner {
            background-color: #d32f2f;
            color: #fff;
            box-shadow: inset -1px -1px 0px #7f1d1d, inset 1px 1px 0px #f87171;
        }

        .role-admin {
            background-color: #ffa500;
            color: #fff;
            box-shadow: inset -1px -1px 0px #b37400, inset 1px 1px 0px #ffd280;
        }

        .role-builder {
            background-color: #00bfff;
            color: #fff;
            box-shadow: inset -1px -1px 0px #0086b3, inset 1px 1px 0px #80dfff;
        }

        .role-member {
            background-color: var(--main-color);
            color: #fff;
            box-shadow: inset -1px -1px 0px #00632c, inset 1px 1px 0px #4dff88;
        }

        .member-status {
            font-size: 0.9rem;
            color: #888;
            font-style: italic;
        }

        .btn-profile-view {
            margin-top: 6px;
            text-decoration: none;
            color: var(--main-color);
            font-weight: bold;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            align-self: flex-start;
            transition: color 0.2s;
        }

        .btn-profile-view:hover {
            color: #00ff66;
            text-decoration: underline;
        }

        /* Premium Dark Modal overlay */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(5px);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: #151515;
            color: #fff;
            border: 3px solid var(--main-color);
            width: 90%;
            max-width: 500px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
            position: relative;
            text-align: center;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 2rem;
            cursor: pointer;
            color: #888;
            transition: color 0.2s;
        }

        .close:hover {
            color: #fff;
        }

        #modalImage {
            width: 120px;
            height: 240px;
            object-fit: contain;
            margin: 0 auto 20px;
            display: block;
            image-rendering: pixelated;
        }

        .modal-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .modal-header-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        #modalName {
            font-size: 1.8rem;
            margin: 0;
            text-shadow: 2px 2px 0px #000;
        }

        #modalRole {
            display: inline-block;
        }

        #modalDescription {
            font-size: 1.1rem;
            color: #ccc;
            line-height: 1.6;
            text-shadow: 1px 1px 0px #000;
            background-color: #0b0b0b;
            padding: 15px;
            border: 2px solid #222;
            border-radius: 4px;
        }
    </style>

    <h1 class="title-tab">Server Members</h1>
    <p>Meet the staff members and players who shape the world of Vexorious.</p>

    <!-- Search Input -->
    <div class="search-bar-container">
        <input type="text" id="memberSearch" class="search-input" placeholder="Search members by username or rank...">
    </div>

    <div class="member-container" id="memberGrid">
        @foreach($members as $m)
            <div class="member" data-name="{{ $m['name'] }}" data-role="{{ $m['role'] }}" data-xuid="{{ $m['xuid'] ?? '' }}">
                <img src="{{ $m['avatar'] }}" alt="{{ $m['name'] }} Head" class="member-image">
                <div class="member-info">
                    <div class="member-name-row">
                        <p class="member-name">{{ $m['name'] }}</p>
                        <span class="role-badge {{ $m['roleClass'] }}">{{ $m['role'] }}</span>
                    </div>
                    <span class="member-status">{{ $m['status'] }}</span>
                    <a href="#" class="btn-profile-view view-profile"
                        data-name="{{ $m['name'] }}"
                        data-role="{{ $m['role'] }}"
                        data-role-class="{{ $m['roleClass'] }}"
                        data-image="{{ $m['body'] }}"
                        data-description="{{ $m['desc'] }}">
                            View Profile
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Profile Detail Modal -->
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImage" alt="Minecraft Skin Body Render">
            <div class="modal-info">
                <div class="modal-header-row">
                    <h2 id="modalName"></h2>
                    <span id="modalRole" class="role-badge"></span>
                </div>
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById("profileModal");
            const modalName = document.getElementById("modalName");
            const modalImage = document.getElementById("modalImage");
            const modalRole = document.getElementById("modalRole");
            const modalDescription = document.getElementById("modalDescription");
            const closeBtn = document.querySelector(".close");
            const searchInput = document.getElementById("memberSearch");
            const members = document.querySelectorAll(".member");

            // Open Profile modal details
            document.querySelectorAll(".view-profile").forEach(button => {
                button.addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.style.display = "flex";
                    modalName.textContent = this.dataset.name;
                    modalImage.src = this.dataset.image;
                    modalImage.alt = `${this.dataset.name} Full Body Render`;
                    modalDescription.textContent = this.dataset.description;
                    
                    // Apply dynamic role
                    modalRole.textContent = this.dataset.role;
                    modalRole.className = `role-badge ${this.dataset.roleClass}`;
                });
            });

            // Close Modal
            closeBtn.onclick = () => {
                modal.style.display = "none";
            };

            window.onclick = (e) => {
                if (e.target === modal) {
                    modal.style.display = "none";
                }
            };

            // Live filter search logic
            if (searchInput) {
                searchInput.addEventListener("input", (e) => {
                    const query = e.target.value.toLowerCase().trim();
                    members.forEach(member => {
                        const name = member.dataset.name.toLowerCase();
                        const role = member.dataset.role.toLowerCase();
                        if (name.includes(query) || role.includes(query)) {
                            member.style.display = "flex";
                        } else {
                            member.style.display = "none";
                        }
                    });
                });
            }

            // Dynamically load Bedrock skins using GeyserMC skin textures
            document.querySelectorAll(".member").forEach(card => {
                const xuid = card.dataset.xuid;
                if (!xuid) return;

                const img = card.querySelector(".member-image");
                const viewBtn = card.querySelector(".view-profile");

                fetch(`https://api.geysermc.org/v2/skin/${xuid}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.texture_id) {
                            img.src = `https://mc-heads.net/avatar/${data.texture_id}/80`;
                            viewBtn.dataset.image = `https://mc-heads.net/player/${data.texture_id}/right`;
                            
                            // If the modal for this player is currently open, update its image too
                            if (modal.style.display === "flex" && modalName.textContent === card.dataset.name) {
                                modalImage.src = viewBtn.dataset.image;
                            }
                        }
                    })
                    .catch(err => {
                        console.warn(`Failed to fetch Bedrock skin for XUID ${xuid}:`, err);
                    });
            });
        });
    </script>
@endsection
