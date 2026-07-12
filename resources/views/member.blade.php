@extends('welcome')

@section('content')
    <style>
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

    <div class="member">
        <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
        <div class="member-info">
            <p>Dark</p>
            <a href="">View Profile</a>
        </div>
    </div>

    <div class="member">
        <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
        <div class="member-info">
            <p>Potato</p>
            <a href="">View Profile</a>
        </div>
    </div>

    <div class="member">
        <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
        <div class="member-info">
            <p>Remmx</p>
            <a href="">View Profile</a>
        </div>
    </div>

    <div class="member">
        <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
        <div class="member-info">
            <p>Zaenna</p>
            <a href="">View Profile</a>
        </div>
    </div>

    <div class="member">
        <img src="{{ asset('images/sample4.jpg') }}" alt="Member Image" class="member-image">
        <div class="member-info">
            <p>Scyla</p>
            <a href="">View Profile</a>
        </div>
    </div>
@endsection
