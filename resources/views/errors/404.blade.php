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
            width: 40%;
        }

        .nube {
            width: 400px;
            height: 100px;
            border-radius: 50%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            background-color: rgb(211, 255, 247);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .panel {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40%;
            border-left: 250px solid transparent;
            border-bottom: 100vh solid orange;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: relative;
            width: 100vw;
            height: 100vh;
        }

        .title {
            position: absolute;
            top: 239px;
            font-size: 100px;
        }
    </style>
</head>
<div class="container">
    <img src="{{ asset('img/404.png') }}" alt="sorry">
    <div class="panel">
        <h1 class="title">404</h1>
    </div>
</div>

<body>

</body>

</html>
