<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>

    <style>
        :root {
            --main-color: #009844;
            --secondary-color: #000000;
            --accent-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--secondary-color);
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            padding: 40px;
        }

        h1 {
            color: var(--main-color);
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 30px;
        }

        #MainContainer {
            width: 900px;
            margin: auto;
        }

        /* Main Image */
        #ImageHighlight {
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
        }

        #ImageHighlight img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid var(--main-color);
        }

        /* Thumbnail Roll */
        #OtherImageRoll {
            display: flex;
            justify-content: center;
            gap: 15px;
            overflow-x: auto;
            padding: 10px;
        }

        #OtherImageRoll img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            border: 3px solid transparent;
            transition: 0.3s;
        }

        #OtherImageRoll img:hover {
            transform: scale(1.05);
            border-color: var(--main-color);
        }

        #OtherImageRoll img.active {
            border-color: var(--main-color);
        }
    </style>
</head>
<body>

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

<script>
    const mainImage = document.getElementById("mainImage");
    const thumbnails = document.querySelectorAll(".thumb");

    thumbnails.forEach((thumb) => {
        thumb.addEventListener("click", () => {

            mainImage.src = thumb.src;

            thumbnails.forEach(t => t.classList.remove("active"));
            thumb.classList.add("active");

        });
    });
</script>

</body>
</html>