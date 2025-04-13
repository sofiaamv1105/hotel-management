<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Reservas</title>
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
            max-width: 1000px;
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

        .table {
            color: black;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #117a8b;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #bd2130;
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
      <h1>Listado de Reservas</h1>
      <a href="{{ route('reservas.create') }}" class="btn btn-success mb-3">Agregar Reserva</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($reservas as $reserva)
        <tr>
            <td>{{ $reserva->habitacion_id }}</td>
            <td>{{ $reserva->fecha_inicio }}</td>
            <td>{{ $reserva->fecha_fin }}</td>
            <td>{{ $reserva->cliente_nombre }}</td>
            <td>{{ $reserva->cliente_email }}</td>
            <td>
              <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-info btn-sm">Editar</a>
              <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>