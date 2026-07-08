@extends('welcome')

@section('content')
    <h1>Gallery</h1>
    <p>Welcome to the Vexorius Gallery! Here you can explore a collection of amazing creations from our talented community of creators.</p>
    <p>Browse through the gallery to discover inspiring projects, innovative designs, and creative works that showcase the power of Vexorius.</p>
    <p>Whether you're looking for inspiration or want to share your own creations, the gallery is the perfect place to connect with fellow creators and celebrate creativity.</p>

    <div class="content-wrapper">
    <h1>Welcome to Vexorius</h1>
    <p>Explore and Build Amazing Things!</p>

    <div id="MainContainer">

        <!-- Main highlighted image -->
        <div id="ImageHighlight">
            <img
                id="mainImage"
                src="{{ asset('images/sample1.jpg') }}"
                alt="Main Image">
        </div>

        <!-- Thumbnail roll -->
        <div id="OtherImageRoll">

            <img class="thumb active"
                src="{{ asset('images/sample1.jpg') }}"
                alt="Thumbnail">

            <img class="thumb"
                src="{{ asset('images/sample2.jpg') }}"
                alt="Thumbnail">

            <img class="thumb"
                src="{{ asset('images/sample3.jpg') }}"
                alt="Thumbnail">

            <img class="thumb"
                src="{{ asset('images/sample4.jpg') }}"
                alt="Thumbnail">

        </div>

    </div>
</div>
@endsection