<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✦ Tienda Doña Mily ✦</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url("{{ asset('img/tienda.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #f8b400;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            margin-top: 120px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-login {
            background-color: #f8b400;
            color: #000;
            font-weight: bold;
            border: none;
        }

        .btn-login:hover {
            background-color: #f39c12;
            color: #fff;
        }

        h3 {
            font-weight: 700;
            color: #d35400;
        }

        p {
            color: #444;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="login-box">
                <h3>✧ Tienda Doña Mily ✧</h3>
                <p>Inicia sesión para ver los productos de la tienda Doña Mily! >.<</p>

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <input type="text" name="usuario" class="form-control mb-3" placeholder="Usuario" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>
                    <button class="btn btn-login w-100">Ingresar a la TDM ➜</button>
                </form>

                @if(session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
