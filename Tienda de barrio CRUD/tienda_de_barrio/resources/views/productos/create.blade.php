<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffe9c6, #fff7eb);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background: white;
            padding: 35px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #e67e22;
            font-weight: 600;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 6px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        input:focus, select:focus {
            border-color: #e67e22;
            outline: none;
            box-shadow: 0 0 6px rgba(230, 126, 34, 0.3);
        }

        button {
            background-color: #e67e22;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #cf711f;
        }

        .btn-volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #e67e22;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-volver:hover {
            color: #cf711f;
            text-decoration: underline;
        }

        header {
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            padding: 20px;
            color: #fff;
            background: #e67e22;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<header> Agregar Nuevo Producto a la TDM Mily</header>

<div class="container">
    <h2>Registrar Producto</h2>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div style="background-color:#f8d7da; padding:10px; border-radius:8px; color:#842029; margin-bottom:15px;">
            <strong>⚠️ Error:</strong> Verifica los campos antes de continuar.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <label for="nombre_producto">Nombre del producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" min="0" step="0.01" required>

        <label for="id_tipo">Tipo de producto:</label>
        <select id="id_tipo" name="id_tipo" required>
            <option value="">Seleccione un tipo</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id_tipo }}">{{ $tipo->nombre_tipo }}</option>
            @endforeach
        </select>

        <label for="stock">Stock disponible:</label>
        <input type="number" id="stock" name="stock" min="0" required>

        <button type="submit">Guardar Nuevo Producto</button>
    </form>

    <a href="{{ route('productos.index') }}" class="btn-volver">← Volver a productos Mily</a>
</div>

</body>
</html>