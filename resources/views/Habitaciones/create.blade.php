<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ isset($habitacion) ? 'Editar' : 'Crear' }} Habitación</title>
  </head>
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
  <body>
    <div class="container mt-4">
      <h1>{{ isset($habitacion) ? 'Editar' : 'Crear' }} Habitación</h1>

      <form action="{{ isset($habitacion) ? route('habitaciones.update', $habitacion->id) : route('habitaciones.store') }}" method="POST">
        @csrf
        @if (isset($habitacion))
          @method('PUT')
        @endif

        <div class="mb-3">
          <label for="hotel_id" class="form-label">Hotel</label>
          <select name="hotel_id" class="form-select">
            @foreach ($hoteles as $hotel)
              <option value="{{ $hotel->id }}" {{ isset($habitacion) && $habitacion->hotel_id == $hotel->id ? 'selected' : '' }}>
                {{ $hotel->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="type" class="form-label">Tipo</label>
          <input type="text" name="type" class="form-control" value="{{ old('type', $habitacion->type ?? '') }}">
        </div>

        <div class="mb-3">
          <label for="number" class="form-label">Número</label>
          <input type="text" name="number" class="form-control" value="{{ old('number', $habitacion->number ?? '') }}">
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Precio</label>
          <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $habitacion->price ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($habitacion) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('habitaciones.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>