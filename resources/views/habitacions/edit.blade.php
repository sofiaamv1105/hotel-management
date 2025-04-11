<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Habitación</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-4">
      <h1>Editar Habitación</h1>

      <form action="{{ route('habitacions.update', $habitacion->id) }}" method="POST">
        @csrf
        @method('PUT')

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
          <input type="text" name="número" id="número" class="form-control" value="{{ old('número', $habitacion->número) }}">
        </div>

        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <select name="tipo" id="tipo" class="form-select">
            @php
              $tipos = ['Simple', 'Doble', 'Triple', 'Familiar', 'Suite', 'Deluxe', 'Presidencial'];
            @endphp
            @foreach ($tipos as $tipo)
              <option value="{{ $tipo }}" {{ old('tipo', $habitacion->tipo) == $tipo ? 'selected' : '' }}>
                {{ $tipo }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="precio_por_noche" class="form-label">Precio por noche</label>
          <input type="number" step="0.01" name="precio_por_noche" id="precio_por_noche" class="form-control" value="{{ old('precio_por_noche', $habitacion->precio_por_noche) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('habitacions.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>