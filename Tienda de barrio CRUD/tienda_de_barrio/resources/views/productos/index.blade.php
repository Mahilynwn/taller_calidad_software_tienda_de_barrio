<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos de TDM</title>
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
        .container { display: flex; min-height: 90vh; }
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
        .sidebar h3 { margin-bottom: 30px; font-size: 18px; letter-spacing: 1px; }
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
        .sidebar a:not(.btn-logout) { background-color: #f4b942; }
        .sidebar a:not(.btn-logout):hover { background-color: #ffce5c; transform: scale(1.05); }
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
        .btn-logout:hover { background-color: #ff4d5a; transform: scale(1.08); }
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 8px 14px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            color: white;
            display: inline-block;
        }
        .btn-crear { background:#ff7675; }
        .btn-editar { background:#3498db; padding:6px 10px; border-radius:8px; }
        .btn-eliminar { background:#e74c3c; padding:6px 10px; border-radius:8px; border:none; color:#fff; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        thead th { background:#f9e79f; padding:12px; text-align:left; }
        tbody td { padding:12px; border-bottom:1px solid #f1c40f; }
        .center { text-align:center; }
        .right { text-align:right; }
        .muted { color:#666; font-size:0.95rem; }
        .empty {
            padding: 40px;
            text-align:center;
            color:#7a7a7a;
            font-weight:600;
        }
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            background: #fff3cd;
            padding: 15px;
            border-radius: 12px;
        }
        .filter-form input, .filter-form select {
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
        .alert {
            margin-top: 12px;
            padding: 10px;
            background: #ffeeba;
            border-radius: 8px;
            text-align: center;
            color: #856404;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>୧ ‧₊˚ 🍮 ⋅ ☆ Productos de TDM</header>

<div class="container">
    <aside class="sidebar">
        <div class="menu-links">
            <h3>MENÚ</h3>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('tipos.index') }}">Tipos</a>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
    </aside>

    <main class="main-content">
        <div class="topbar">
            <a href="{{ route('productos.create') }}" class="btn btn-crear">➕ Crear nuevo producto</a>
        </div>

        <form method="GET" action="{{ route('productos.index') }}" class="filter-form">
            <input type="text" name="nombre" placeholder="Nombre" value="{{ request('nombre') }}">
            <input type="number" name="precio_min" placeholder="Precio mínimo" value="{{ request('precio_min') }}">
            <input type="number" name="precio_max" placeholder="Precio máximo" value="{{ request('precio_max') }}">
            <select name="id_tipo">
                <option value="">Tipo de producto</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id_tipo }}" {{ request('id_tipo') == $tipo->id_tipo ? 'selected' : '' }}>
                        {{ $tipo->nombre_tipo }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
        </form>

        @if(session('success'))
            <div style="margin-top:12px; padding:10px; background:#d4f4dd; border-radius:8px;">
                {{ session('success') }}
            </div>
        @endif

        @if(isset($mensaje))
            <div class="alert">{{ $mensaje }}</div>
        @elseif($productos->isEmpty())
            <div class="empty">No hay productos para mostrar.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Tipo de Producto</th>
                        <th class="center">Stock</th>
                        <th class="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td class="muted">{{ $producto->id_producto }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td class="right">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                            <td>{{ $producto->tipo->nombre_tipo ?? 'Sin tipo' }}</td>
                            <td class="center">{{ $producto->stock }}</td>
                            <td class="center">
                                <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-editar">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este producto?')">
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
