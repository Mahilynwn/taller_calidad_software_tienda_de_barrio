<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tipos de Producto - TDM</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #ffeaa7, #fbc531, #f1c40f);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6b3e1e;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: 90vh;
        }

        .sidebar {
            width: 220px;
            background-color: #b37a39;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .menu-links {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h3 {
            margin-bottom: 30px;
            font-size: 18px;
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

        .sidebar a:not(.btn-logout) {
            background-color: #f4b942;
        }

        .sidebar a:not(.btn-logout):hover {
            background-color: #ffce5c;
            transform: scale(1.05);
        }

        .btn-logout {
            background-color: #e63946;
            color: white;
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 20px;
            text-decoration: none;
            text-align: center;
            width: 150px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #ff4d5a;
            transform: scale(1.08);
        }

        .main-content {
            flex: 1;
            padding: 40px;
            text-align: left;
            background: #fffbe6;
            border-radius: 20px 0 0 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        .topbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            color: white;
            cursor: pointer;
            display: inline-block;
        }

        .btn-crear { background:#ff7675; }
        .btn-editar { background:#3498db; padding:6px 10px; border-radius:8px; color:#fff; text-decoration:none; }
        .btn-eliminar { background:#e74c3c; padding:6px 10px; border-radius:8px; border:none; color:#fff; }

        table {
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
            background:white;
            border-radius:8px;
            overflow:hidden;
        }

        thead th {
            background:#f9e79f;
            padding:12px;
            text-align:left;
        }

        tbody td {
            padding:12px;
            border-bottom:1px solid #f1c40f;
        }

        .center { text-align:center; }
        .muted { color:#666; font-size:0.95rem; }
        .empty { padding:40px; text-align:center; color:#7a7a7a; font-weight:600; }

        /* --- FILTROS --- */
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            background: #fff3cd;
            padding: 15px;
            border-radius: 12px;
        }
        .filter-form input {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #ccc;
            min-width: 140px;
        }
        .filter-form button {
            background-color: #6b3e1e;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .filter-form button:hover { background-color: #8b5a2b; }
    </style>
</head>
<body>

<header>Tipos de Productos . ⋆⸜ 🍵✮˚</header>

<div class="container">
    <aside class="sidebar">
        <div class="menu-links">
            <h3>MENÚ</h3>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('productos.index') }}">Productos</a>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
    </aside>

    <main class="main-content">
        <div class="topbar">
            <a href="{{ route('tipos.create') }}" class="btn btn-crear">➕ Crear nuevo tipo</a>
        </div>

        <form method="GET" action="{{ route('tipos.index') }}" class="filter-form">
            <input type="text" name="nombre" placeholder="Nombre del tipo" value="{{ request('nombre') }}">
            <input type="text" name="descripcion" placeholder="Descripción" value="{{ request('descripcion') }}">
            <button type="submit">Filtrar</button>
        </form>

        @if(session('success'))
            <div style="margin-top:12px; padding:10px; background:#d4f4dd; border-radius:8px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="margin-top:12px; padding:10px; background:#f8d7da; border-radius:8px;">
                {{ session('error') }}
            </div>
        @endif

        @if($tipos->isEmpty())
            <div class="empty">No hay tipos de producto para mostrar.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Tipo</th>
                        <th>Descripción</th>
                        <th class="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                        <tr>
                            <td class="muted">{{ $tipo->id_tipo }}</td>
                            <td>{{ $tipo->nombre_tipo }}</td>
                            <td>{{ $tipo->descripcion ?? '—' }}</td>
                            <td class="center">
                                <a href="{{ route('tipos.edit', $tipo->id_tipo) }}" class="btn-editar">Editar</a>
                                <form action="{{ route('tipos.destroy', $tipo->id_tipo) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este tipo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>
</div>
</body>
</html>
