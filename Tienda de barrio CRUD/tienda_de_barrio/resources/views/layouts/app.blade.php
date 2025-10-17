<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM - Panel de Mily</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #ffe9b3, #fff1c1);
            font-family: 'Comic Sans MS', cursive;
        }
        .sidebar {
            width: 220px;
            background-color: #704214;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 20px;
            color: white;
        }
        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            color: white;
        }
        .sidebar a:hover {
            background-color: #f8b400;
            color: #000;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .btn-logout {
            background-color: #cc0000 !important;
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>🍶 TDM</h3>
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('tipos.index') }}">Tipos de Productos</a>
        <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
