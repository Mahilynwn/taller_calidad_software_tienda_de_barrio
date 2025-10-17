<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tipo de Producto</title>
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
        <h2>Agregar nuevo Tipo de Producto</h2>

        <form action="{{ route('tipos.store') }}" method="POST">
            @csrf
            <label for="nombre">Nombre del tipo:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea 
                name="descripcion" 
                id="descripcion" 
                rows="3" 
                placeholder="Describe este tipo de producto para que los clientes lo entiendan mejor ⋆˚࿔" 
                required
            ></textarea>

            <button type="submit">Guardar Nuevo TP Mily</button>
        </form>

        <a href="{{ route('tipos.create') }}">← Volver a la lista de TP Mily</a>
    </div>
</body>
</html>
