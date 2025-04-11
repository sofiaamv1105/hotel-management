<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('habitacions.index', compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        return view('habitacions.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'hotel_id' => 'required|exists:hotels,id',
        'número' => 'required',
        'tipo' => 'required',
        'precio_por_noche' => 'required|numeric',
    ]);

    Habitacion::create($request->all());

    return redirect()->route('habitacions.index')->with('success', 'Habitación creada correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion)
    {
        $hotels = Hotel::all();
        return view('habitacions.edit', compact('habitacion', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
    $request->validate([
        'hotel_id' => 'required|exists:hotels,id',
        'número' => 'required',
        'tipo' => 'required',
        'precio_por_noche' => 'required|numeric',
    ]);

    $habitacion->update($request->all());

    return redirect()->route('habitacions.index')->with('success', 'Habitación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();
        return redirect()->route('habitacions.index')->with('success', 'Habitación eliminada correctamente.');
    }
}
