<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hotel Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
      rel="stylesheet"
    >
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg-cover {
            background-image: url('/images/hotel-fondo.jpg'); /* Cambia por una imagen elegante de hotel */
            background-size: cover;
            background-position: center;
            height: 100%;
            color: white;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
        }

        .btn-custom {
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 500;
        }

        h1 span {
            color: #ffc107;
        }
    </style>
</head>
<body>

<div class="bg-cover">
    <div class="overlay d-flex flex-column justify-content-center align-items-center text-center px-4">
        <h1 class="display-3 fw-bold mb-3">🏨 <span>Hotel Management</span></h1>
        <p class="lead">Administra reservas, habitaciones y más desde una plataforma profesional</p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg me-3 btn-custom">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="btn btn-warning text-dark btn-lg btn-custom">Registrarse</a>
        </div>
    </div>
</div>

</body>
</html>