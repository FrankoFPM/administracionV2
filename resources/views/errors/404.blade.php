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

        .panel {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 51%;
            /* border-left: 250px solid transparent; */
            border-bottom: 100vh solid #f9ba85;
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
        .title2 {
            position: absolute;
            top: 400px;
            font-size: 50px;
        }
        .btn{
            position: absolute;
            top: 600px;
            font-size: 24px;
            text-decoration: none;
            background-color: white;
            padding: 20px 20px;
            border-radius: 20px;
            color: brown;
            font-weight: bold;
        }
        .btn:hover{
            background-color: #c6365b;
            color: white;
        }
    </style>
</head>
<div class="container">
    <img src="{{ asset('img/404.png') }}" alt="sorry">
    <div class="panel">
        <h1 class="title">404</h1>
        <h2 class="title2">Pagina no encontrada</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn">Volver al menu principal</a>
    </div>
</div>

<body>

</body>

</html>
