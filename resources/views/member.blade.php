@extends('welcome')

@section('content')
    <style>
        #modalImage {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%; /* Circle */

            border: 4px solid var(--main-color);

            display: block;
            margin: 0 auto 20px;
        }

        #modalName {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 10px;
            color: var(--accent-color);
        }

        #modalDescription {
            text-align: center;
            font-size: 1.1em;
            color: var(--accent-color);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0,0,0,.7);
        }

        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            background: var(--background-color);
            color: black;
            border: var(--main-color) 3px solid;

            width: 90%;
            max-width: 700px;
            min-width: 300px;

            max-height: 80vh;
            min-height: 250px;

            overflow-y: auto;

            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,.4);
        }

        .close {
            float: right;
            font-size: 30px;
            cursor: pointer;
            color: var(--main-color);
        }
        .member-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 members per row */
            gap: 30px;
            max-width: 1400px;
            margin: 50px auto;
        }

        .member {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .member-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .member-info {
            display: flex;
            flex-direction: column;
            text-align: left;
            padding-left: 20px;
        }

        .member-info p {
            margin: 0;
            font-size: 1.2em;
            font-weight: bold;
        }

        .member-info a {
            margin-top: 10px;
            text-decoration: none;
            color: var(--main-color);
            font-weight: bold;
        }

        .member-info a:hover {
            text-decoration: underline;
        }

        .member {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding-top: 50px;
            padding-left: 50px;
        }
    </style>



    <h1 class="title-tab">Member Area</h1>
    <p>Welcome to the member area of Vexorius. Here you can access exclusive content, resources, and tools to help you on your creative journey.</p>
    <p>As a member, you'll have the opportunity to connect with other creators, share your work, and receive feedback from the community.</p>
    <p>Join us today and take your creativity to the next level!</p>

    <div class="member-container">

        <div class="member">
            <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
            <div class="member-info">
                <p>Dark</p>
                <a href="#" class="view-profile"
                    data-name="Dark"
                    data-image="{{ asset('images/sample4.jpg') }}"
                    data-description="Founder of Vexorius. Loves web development.">
                        View Profile
                </a>
            </div>
        </div>

        <div class="member">
            <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
            <div class="member-info">
                <p>Potato</p>
                <a href="#" class="view-profile"
                    data-name="Potato"
                    data-image="{{ asset('images/sample4.jpg') }}"
                    data-description="Member of Vexorius. Enjoys gaming and coding.">
                        View Profile
                </a>
            </div>
        </div>

        <div class="member">
            <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
            <div class="member-info">
                <p>Remmx</p>
                <a href="#" class="view-profile"
                    data-name="Remmx"
                    data-image="{{ asset('images/sample4.jpg') }}"
                    data-description="Member of Vexorius. Passionate about art and design.">
                        View Profile
                </a>
            </div>
        </div>

        <div class="member">
            <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
            <div class="member-info">
                <p>Zaenna</p>
                <a href="#" class="view-profile"
                    data-name="Zaenna"
                    data-image="{{ asset('images/sample4.jpg') }}"
                    data-description="Member of Vexorius. Enjoys music and writing.">
                        View Profile
                </a>
            </div>
        </div>

        <div class="member">
            <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
            <div class="member-info">
                <p>Scyla</p>
                <a href="#" class="view-profile"
                    data-name="Scyla"
                    data-image="{{ asset('images/sample4.jpg') }}"
                    data-description="Member of Vexorius. Enjoys photography and travel.">
                        View Profile
                </a>
            </div>
        </div>

    </div>

    <div id="profileModal" class="modal">
        <div class="modal-content">

            <span class="close">&times;</span>

            <img id="modalImage">

            <h2 id="modalName"></h2>

            <p id="modalDescription"></p>

        </div>
    </div>

    <script>
        const modal = document.getElementById("profileModal");

        document.querySelectorAll(".view-profile").forEach(button => {

            button.addEventListener("click", function(e){

                e.preventDefault();

                modal.style.display = "block";

                document.getElementById("modalName").textContent = this.dataset.name;
                document.getElementById("modalImage").src = this.dataset.image;
                document.getElementById("modalDescription").textContent = this.dataset.description;

            });

        });

        document.querySelector(".close").onclick = () => {
            modal.style.display = "none";
        };

        window.onclick = (e) => {
            if(e.target === modal){
                modal.style.display = "none";
            }
        };
    </script>
@endsection
