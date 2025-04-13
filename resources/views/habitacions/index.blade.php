<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Habitaciones</title>
    <style>
        .dashboard-background {
            background: url('{{ asset('images/habitacion-fondo.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            padding: 50px 0;
            min-height: 100vh;
        }

        .content-box {
            width: 85%;
            max-width: 900px;
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

        .table {
            color: black;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .table th, .table td {
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.2);
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

        .btn-danger {
            background-color: #c0392b;
            border: none;
        }

        .btn-danger:hover {
            background-color: #992d22;
        }

        .btn-success {
            background-color: #27ae60;
            border: none;
        }

        .btn-success:hover {
            background-color: #1e8449;
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
    <h1>Listado de Habitaciones</h1>
    <a href="{{ route('habitacions.create') }}" class="btn btn-success mb-3">Agregar Habitación</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Hotel</th>
            <th>Tipo</th>
            <th>Número</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($habitaciones as $habitacion)
            <tr>
                <td>{{ $habitacion->hotel_id }}</td>
                <td>{{ $habitacion->hotel->nombre }}</td>
                <td>{{ $habitacion->tipo }}</td>
                <td>{{ $habitacion->número }}</td>
                <td>${{ $habitacion->precio_por_noche }}</td>
                <td>
                    <a href="{{ route('habitacions.edit', $habitacion->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('habitacions.destroy', $habitacion->id) }}" method="POST" style="display:inline-block;">
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>