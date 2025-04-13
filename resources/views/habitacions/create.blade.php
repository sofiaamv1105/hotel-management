<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ isset($habitacion) ? 'Editar' : 'Crear' }} Habitación</title>
    <style>
      .dashboard-background {
          background: url('{{ asset('images/habitacion-fondo.jpg') }}') no-repeat center center fixed;
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
          color: black;
          font-weight: 500;
      }

      .form-control, .form-select {
          background: rgba(255,255,255,0.8);
          border-radius: 8px;
      }

      .btn-primary {
          background-color: #2a74bd;
          border: none;
      }

      .btn-primary:hover {
          background-color: #1d5a94;
      }

      .btn-secondary {
          background-color: #888;
          border: none;
      }

      .btn-secondary:hover {
          background-color: #666;
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
        <h1>{{ isset($habitacion) ? 'Editar' : 'Crear' }} Habitación</h1>

        <form action="{{ isset($habitacion) ? route('habitacions.update', $habitacion->id) : route('habitacions.store') }}" method="POST">
          @csrf
          @if (isset($habitacion))
            @method('PUT')
          @endif

          <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-select">
              @foreach ($hotels as $hotel)
                <option value="{{ $hotel->id }}" {{ isset($habitacion) && $habitacion->hotel_id == $hotel->id ? 'selected' : '' }}>
                  {{ $hotel->nombre }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="número" class="form-label">Número</label>
            <input type="text" name="número" id="número" class="form-control" value="{{ old('número', $habitacion->número ?? '') }}">
          </div>

          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select">
              @php
                $tipos = ['Simple', 'Doble', 'Triple', 'Familiar', 'Suite', 'Deluxe', 'Presidencial'];
              @endphp
              @foreach ($tipos as $tipo)
                <option value="{{ $tipo }}" {{ old('tipo', $habitacion->tipo ?? '') === $tipo ? 'selected' : '' }}>
                  {{ $tipo }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="precio_por_noche" class="form-label">Precio por noche</label>
            <input type="number" step="0.01" name="precio_por_noche" id="precio_por_noche" class="form-control" value="{{ old('precio_por_noche', $habitacion->precio_por_noche ?? '') }}">
          </div>

          <button type="submit" class="btn btn-primary">{{ isset($habitacion) ? 'Actualizar' : 'Crear' }}</button>
          <a href="{{ route('habitacions.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>