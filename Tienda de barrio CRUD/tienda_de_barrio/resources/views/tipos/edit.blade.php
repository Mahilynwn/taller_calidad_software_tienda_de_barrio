<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tipo</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff6e5, #ffd86b);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 80px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #d35400;
            margin-bottom: 25px;
        }
        label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }
        button {
            background: #e67e22;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover {
            background: #d35400;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 18px;
            text-decoration: none;
            color: #d35400;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar TP Mily</h2>

        <form action="{{ route('tipos.update', $tipo->id_tipo) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre del tipo:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $tipo->nombre_tipo) }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3">{{ old('descripcion', $tipo->descripcion) }}</textarea>

            <button type="submit">Guardar TP</button>
        </form>

        <a href="{{ route('tipos.index') }}">← Volver a la lista de TP Mily</a>
    </div>
</body>
</html>
