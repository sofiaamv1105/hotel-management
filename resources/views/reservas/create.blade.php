<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .dashboard-background {
          background: url('{{ asset('images/reservas-fondo.jpg') }}') no-repeat center center fixed;
          background-size: cover;
          padding: 50px 0;
          min-height: 100vh;
      }

      .content-box {
          width: 90%;
          max-width: 800px;
          margin: 0 auto;
          background: rgba(255, 255, 255, 0.15);
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
      }

      .form-control, .form-select {
          background-color: rgba(255, 255, 255, 0.9);
      }

      .btn-primary {
          background-color: #007bff;
          border: none;
      }

      .btn-primary:hover {
          background-color: #0056b3;
      }

      .btn-secondary {
          background-color: #6c757d;
          border: none;
      }

      .btn-secondary:hover {
          background-color: #545b62;
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
      <h1>Crear Reserva</h1>

      <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="habitacion_id" class="form-label">Habitación</label>
          <select name="habitacion_id" id="habitacion_id" class="form-select">
            @foreach ($habitacions as $habitacion)
              <option value="{{ $habitacion->id }}">
                {{ $habitacion->tipo }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
          <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}">
        </div>

        <div class="mb-3">
          <label for="fecha_fin" class="form-label">Fecha de Fin</label>
          <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
        </div>

        <div class="mb-3">
          <label for="cliente_nombre" class="form-label">Nombre del Cliente</label>
          <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" value="{{ old('cliente_nombre') }}">
        </div>

        <div class="mb-3">
          <label for="cliente_email" class="form-label">Email del Cliente</label>
          <input type="email" name="cliente_email" id="cliente_email" class="form-control" value="{{ old('cliente_email') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>