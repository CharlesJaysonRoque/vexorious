@extends('welcome')

@section('content')
    <h1 class="title-tab">Welcome to Vexorius</h1>
    <p>Discover the power of Vexorius and unleash your creativity.</p>
    <div class="divider">
        <h2>Lore</h2>
        <p>Vexorius is a vibrant community of creators and innovators dedicated to pushing the boundaries of what's possible.</p>
    </div>
    <div class="divider home-members">
        <h2>Sample Builds</h2>
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
@endsection
