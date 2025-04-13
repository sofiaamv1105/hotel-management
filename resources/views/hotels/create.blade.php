<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dashboard-background {
            background: url('{{ asset('images/hotels-fondo.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            padding: 50px 0;
            min-height: 100vh;
        }

        .content-box {
            width: 85%;
            max-width: 700px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            color: black;
        }

        .content-box h1 {
            color: black;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: black;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            color: black;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #2a74bd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d5a94;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #616a6b;
        }
    </style>
  </head>
  <body class="dashboard-background">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('habitacions.index') }}">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('hotels.index') }}">Hoteles</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
      </nav>
    <div class="content-box">
      <h1>Agregar Hotel</h1>
      <form method="POST" action="{{ route('hotels.store') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Ubicación</label>
          <input type="text" name="ubicación" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Número Teléfono</label>
          <input type="text" name="número_telefono" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email de Contacto</label>
          <input type="email" name="email_contacto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>