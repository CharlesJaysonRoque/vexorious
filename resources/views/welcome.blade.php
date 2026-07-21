<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vexorious | Bedrock Survival Server</title>
    <meta name="description" content="Vexorious is a Minecraft Bedrock SMP survival server community featuring land claims, commercial district player shops, and cross-platform play.">

    <style>
        @font-face {
            font-family: 'Mojangles';
            src: url('{{ asset("fonts/Mojangles.otf") }}') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --main-color: #009844;
            --secondary-color: #000000;
            --accent-color: #ffffff;
            --dark-grey: #141414;
            --background-color: #1a1a1a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--background-color);
            font-family: 'Mojangles', Arial, sans-serif;
            color: white;
            text-align: center;
            padding: 0;
            margin: 0;
            overflow-x: hidden;
        }

        /* Custom Scrollbar for Minecraft Theme */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #111;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--main-color);
            border: 2px solid #111;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00b350;
        }

        /* Content Wrapper */
        .content-wrapper {
            padding: 60px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            color: var(--main-color);
            margin-bottom: 12px;
            font-size: 2.8rem;
            text-shadow: 3px 3px 0px #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        p {
            margin-bottom: 40px;
            font-size: 1.25rem;
            color: #ccc;
            text-shadow: 2px 2px 0px #000;
        }

        .title-tab {
            padding-top: 50px;
        }

        .divider h3 {
            padding-top: 50px;
            padding-bottom: 20px;
        }



        @media (max-width: 600px) {
            .ImageHighlight {
                height: 300px;
            }
            .OtherImageRoll img {
                width: 100px;
                height: 70px;
            }
            h1 {
                font-size: 2.2rem;
            }
            p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

@include('navbar')

@yield('content')

</body>
</html>
