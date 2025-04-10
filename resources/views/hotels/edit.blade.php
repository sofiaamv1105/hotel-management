<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Hotel</title>
  </head>
  <body>
    <div class="container mt-4">
      <h1>Editar Hotel</h1>
      <form method="POST" action="{{ route('hotels.update', $hotel->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" value="{{ $hotel->nombre }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Ubicación</label>
          <input type="text" name="ubicación" class="form-control" value="{{ $hotel->ubicación }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Número Teléfono</label>
          <input type="text" name="número_telefono" class="form-control" value="{{ $hotel->número_telefono }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email de Contacto</label>
          <input type="email" name="email_contacto" class="form-control" value="{{ $hotel->email_contacto }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>