<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffe9c6, #fff7eb);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 450px;
            margin: 70px auto;
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
            display: block;
            margin-bottom: 6px;
            color: #444;
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
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
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

        .success {
            color: green;
            text-align: center;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Producto de TDM Mily</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- 🔧 FORMULARIO DE EDICIÓN -->
    <form action="{{ url('productos/' . $producto->id_producto) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <label for="nombre_producto">Nombre del producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto"
               value="{{ old('nombre_producto', $producto->nombre_producto ?? '') }}"
               required>
        @error('nombre_producto')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Precio -->
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio"
               value="{{ old('precio', $producto->precio ?? '') }}"
               min="0" step="0.01" required>
        @error('precio')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Stock -->
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock"
               value="{{ old('stock', $producto->stock ?? '') }}"
               min="0" required>
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Tipo -->
        <label for="id_tipo">Tipo de producto:</label>
        <select id="id_tipo" name="id_tipo" required>
            <option value="">Seleccione un tipo</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id_tipo }}"
                    {{ $producto->id_tipo == $tipo->id_tipo ? 'selected' : '' }}>
                    {{ $tipo->nombre_tipo }}
                </option>
            @endforeach
        </select>
        @error('id_tipo')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Botón -->
        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="{{ route('productos.index') }}" class="btn-volver">← Volver a la lista de productos Mily</a>
</div>

</body>
</html>