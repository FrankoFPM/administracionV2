<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina no encontrada</title>
    <link rel="stylesheet" href="./css/404.css">
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
