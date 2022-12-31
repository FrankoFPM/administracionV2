<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina no encontrada</title>
    <style>
        body {
            padding: 0%;
            margin: 0%;
            background-image: -webkit-repeating-radial-gradient(circle, white 20px, white 100px, #f9ba85 100px, #f9ba85 200px);
            background-size: 90px 90px;
            font: 1em sans-serif;
        }

        img {
            position: absolute;
            bottom: 0px;
            width: 40vw;
            display: block
        }

        .panel {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 53vw;
            height: 100vh;
            background-color: #f9ba85;
            display: flex;
            align-items: center;
            justify-content: space-around;

        }

        .panel2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
        }

        .container {
            /* width: 100vw;
            height: 100vh; */
        }

        .title {
            font-size: 6vw;
        }

        .title2 {
            font-size: 3vw;
        }

        .btn {
            font-size: 2vw;
            text-decoration: none;
            background-color: white;
            padding: 20px 20px;
            border-radius: 20px;
            color: brown;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #c6365b;
            color: white;
        }

        @media only screen and (max-width: 1000px) {
            .panel {
                position: absolute;
                top: 0;
                width: 100vw;
                height: 44vh;
            }

            .title {
                font-size: 6vh;
            }

            .title2 {
                font-size: 3vh;
            }

            .btn {
                font-size: 2vh;
            }

            img {
                max-height: 50vh;
                width: auto;
                margin: auto;
                left: 50%;
                transform: translate(-50%, 0%);
            }

        }
    </style>
</head>
<div class="container">
    <img src="{{ asset('img/404.png') }}" alt="sorry">
    <div class="panel">
        <div class="panel2">
            <h1 class="title">404</h1>
            <h2 class="title2">Pagina no encontrada</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn">Volver al menu principal</a>
        </div>
    </div>
</div>

<body>

</body>

</html>
