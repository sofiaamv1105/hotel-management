<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'ubicación'        => 'required|string|max:255',
            'número_telefono'  => 'required|string|max:50',
            'email_contacto'   => 'nullable|email|max:255',
        ]);

        Hotel::create($request->all());

        return redirect()->route('hotels.index')->with('success', 'Hotel creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'ubicación'        => 'required|string|max:255',
            'número_telefono'  => 'required|string|max:50',
            'email_contacto'   => 'nullable|email|max:255',
        ]);

        // Actualizar el hotel con los datos proporcionados
        $hotel->update($request->all());

        // Redirigir a la lista de hoteles con un mensaje de éxito
        return redirect()->route('hotels.index')->with('success', 'Hotel actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Hotel eliminado exitosamente.');
    }
}
