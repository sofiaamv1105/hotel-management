<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Hotel</title>
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
  </body>
</html>
