@extends('layouts.app')

@section('content')
<style>
    .dashboard-background {
        background: url('{{ asset('images/hotel-fondo.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        padding: 60px 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hotel-dashboard {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        padding: 30px;
        max-width: 900px;
        width: 100%;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    }

    .dashboard-title {
        text-align: center;
        color: #ffffff;
        font-size: 2rem;
        font-weight: bold; 
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px #000;
    }

    .dashboard-menu a {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        margin-bottom: 15px;
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .dashboard-menu a:hover {
        background-color: rgba(255, 255, 255, 0.3);
        padding-left: 30px;
        color: #fff;
    }

    .dashboard-menu a.active {
        background-color: rgba(0, 123, 255, 0.6);
    }

    .dashboard-menu i {
        margin-right: 12px;
        font-size: 1.2rem;
    }
</style>

<div class="dashboard-background">
    <div class="hotel-dashboard">
        <div class="dashboard-title">Hotel Management</div>
        <div class="dashboard-menu">
            <a href="{{ route('hotels.index') }}" class="{{ request()->routeIs('hotels.*') ? 'active' : '' }}">
                <i class="fas fa-hotel"></i> Gestión de Hoteles
            </a>
            <a href="{{ route('habitacions.index') }}" class="{{ request()->routeIs('habitacions.*') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i> Gestión de Habitaciones
            </a>
            <a href="{{ route('reservas.index') }}" class="{{ request()->routeIs('reservas.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Gestión de Reservas
            </a>
        </div>
    </div>
</div>
@endsection