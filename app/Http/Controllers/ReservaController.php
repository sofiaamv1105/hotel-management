<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $habitacions = Habitacion::all();
        return view('reservas.create', compact('habitacions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'habitacion_id'   => 'required|exists:habitacions,id',
            'fecha_inicio'    => 'required|date|before_or_equal:fecha_fin',
            'fecha_fin'       => 'required|date|after_or_equal:fecha_inicio',
            'cliente_nombre'  => 'required|string|max:255',
            'cliente_email'   => 'required|email|max:255',
        ]);
        
        Reserva::create($request->all());
    
        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        $habitacions = Habitacion::all();
        return view('reservas.edit', compact('reserva', 'habitacions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'habitacion_id'   => 'required|exists:habitacions,id',
            'fecha_inicio'    => 'required|date|before_or_equal:fecha_fin',
            'fecha_fin'       => 'required|date|after_or_equal:fecha_inicio',
            'cliente_nombre'  => 'required|string|max:255',
            'cliente_email'   => 'required|email|max:255',
        ]);        
    
        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
