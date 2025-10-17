<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM - Panel de Mily </title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #ffe08a, #f7b733);
        }

        header {
            background-color: #6b3e1e;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: 90vh;
        }

        /* 🔸 Menú lateral */
        .sidebar {
            width: 220px;
            background-color: #b37a39;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between; /* 👈 empuja el botón rojo hacia abajo */
        }

        .menu-links {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h3 {
            margin-bottom: 30px;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border-radius: 10px;
            width: 150px;
            text-align: center;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        /* 🔸 Enlaces normales */
        .sidebar a:not(.btn-logout) {
            background-color: #f4b942;
        }

        .sidebar a:not(.btn-logout):hover {
            background-color: #ffce5c;
            transform: scale(1.05);
        }

        /* 🔸 Botón de cerrar sesión (rojo elegante y visible) */
        .btn-logout {
            background-color: #e63946; /* rojito visible */
            color: white;
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 20px;
            text-decoration: none;
            text-align: center;
            width: 150px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #ff4d5a; /* tono más claro al pasar el mouse */
            transform: scale(1.08);
        }

        /* 🔸 Contenido central */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .btn {
            display: block;
            text-decoration: none;
            color: white;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.08);
        }

        .btn-productos, .btn-tipos {
            background-color: #9b723dff;
            color: #ffe8c9ff;
        }

    </style>
</head>
<body>

    <header>
        TDM - Panel de Mily ૮₍ ˶ᵔ ᵕ ᵔ˶ ₎ა
    </header>

    <div class="container">
        <!-- 🔹 MENÚ LATERAL -->
        <aside class="sidebar">
            <div class="menu-links">
                <h3>MENÚ</h3>
                <a href="{{ route('productos.index') }}">Productos</a>
                <a href="{{ route('tipos.index') }}">Tipos</a>
            </div>
            <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
        </aside>

        <!-- 🔹 CONTENIDO CENTRAL -->
        <main class="content">
            <a href="{{ route('productos.index') }}" class="btn btn-productos">Productos Mily ૮₍ ˃ ⤙ ˂ ₎ა</a>
            <a href="{{ route('tipos.index') }}" class="btn btn-tipos">Tipos de Productos Mily૮₍ ´ ꒳ `₎ა</a>
        </main>
    </div>

</body>
</html>
