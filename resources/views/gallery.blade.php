@extends('welcome')

@section('content')
    <style>
        .GalleryGrid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 per row */
            gap: 30px;
            max-width: 1800px;
            margin: auto;
        }
        .MainContainer {
            text-align: center;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }

        /* Main Image */
        .ImageHighlight {
            width: 80%;
            aspect-ratio: 16 / 9; /* or 4 / 3, 1 / 1, etc. */
            margin-bottom: 20px;
        }

        .ImageHighlight img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid var(--main-color);
        }

        /* Thumbnail Roll */
        .OtherImageRoll {
            display: flex;
            justify-content: center;
            gap: 15px;
            overflow-x: auto;
            padding: 10px;
        }

        .OtherImageRoll img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            border: 3px solid transparent;
            transition: 0.3s;
        }

        .OtherImageRoll img:hover {
            transform: scale(1.05);
            border-color: var(--main-color);
        }

        .OtherImageRoll img.active {
            transform: scale(1.05);
            border-color: var(--main-color);
        }
    </style>

    <h1 class="title-tab">Gallery</h1>
    <p>Welcome to the Vexorius Gallery! Here you can explore a collection of amazing creations from our talented community of creators.</p>
    <p>Browse through the gallery to discover inspiring projects, innovative designs, and creative works that showcase the power of Vexorius.</p>
    <p>Whether you're looking for inspiration or want to share your own creations, the gallery is the perfect place to connect with fellow creators and celebrate creativity.</p>

    <div class="GalleryGrid">

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

        <div class="MainContainer">
            <div class="ImageHighlight">
                <img class="mainImage"
                    src="{{ asset('images/sample1.jpg') }}">
            </div>

            <div class="OtherImageRoll">
                <img class="thumb active"
                    src="{{ asset('images/sample1.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample2.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample3.jpg') }}">

                <img class="thumb"
                    src="{{ asset('images/sample4.jpg') }}">
            </div>
        </div>

    </div>

    <script>
        document.querySelectorAll(".MainContainer").forEach(container => {

            const mainImage = container.querySelector(".mainImage");
            const thumbnails = container.querySelectorAll(".thumb");

            thumbnails.forEach(thumb => {

                thumb.addEventListener("click", () => {

                    mainImage.src = thumb.src;

                    thumbnails.forEach(t => t.classList.remove("active"));

                    thumb.classList.add("active");

                });

            });

        });
    </script>
@endsection
