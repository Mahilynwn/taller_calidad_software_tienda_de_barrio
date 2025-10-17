<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✨ Tienda Doña Mily ✨</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">
    <div class="login-container">
        <h1>✧ Tienda Doña Mily ✧</h1>
        <p>Inicia sesión para ver los productos de la tienda Doña Mily! >.<</p>

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar a la TDM →</button>
        </form>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>
