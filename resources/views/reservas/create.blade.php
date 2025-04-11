<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ isset($reserva) ? 'Editar' : 'Crear' }} Reserva</title>
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
      <h1>{{ isset($reserva) ? 'Editar' : 'Crear' }} Habitación</h1>

      <form action="{{ isset($reserva) ? route('reservas.update', $reserva->id) : route('reservas.store') }}" method="POST">
  @csrf
  @if (isset($reserva))
    @method('PUT')
  @endif

  <div class="mb-3">
    <label for="habitacion_id" class="form-label">Habitacion</label>
    <select name="habitacion_id" id="habitacion_id" class="form-select">
      @foreach ($habitacions as $habitacion)
        <option value="{{ $habitacion->id }}" {{ isset($reserva) && $reserva->habitacion_id == $habitacion->id ? 'selected' : '' }}>
          {{ $habitacion->tipo }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', $reserva->fecha_inicio ?? '') }}">
  </div>

  <div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
    <input type="date" step="0.01" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin', $reserva->fecha_fin ?? '') }}">
  </div>

  <div class="mb-3">
    <label for="cliente_nombre" class="form-label">Nombre del Cliente</label>
    <input type="text" step="0.01" name="cliente_nombre" id="cliente_nombre" class="form-control" value="{{ old('cliente_nombre', $reserva->cliente_nombre ?? '') }}">
  </div>

  <div class="mb-3">
    <label for="cliente_email" class="form-label">Email del Cliente</label>
    <input type="text" step="0.01" name="cliente_email" id="cliente_email" class="form-control" value="{{ old('cliente_email', $reserva->cliente_email ?? '') }}">
  </div>

  <button type="submit" class="btn btn-primary">{{ isset($reserva) ? 'Actualizar' : 'Crear' }}</button>
  <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
    </div>
  </body>
</html>