<?php

namespace App\Http\Controllers;

use App\Models\DeteccionNecesidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CoordinacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detecciones = DeteccionNecesidades::with('carrera', 'deteccion_facilitador')
            ->where('aceptado', '=', 0)
            ->get();

        return Inertia::render('Views/desarrollo/coordinacion/DeteccionCoordinacion', [
            'detecciones' => $detecciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'aceptado' => ['required']
        ]);


        $detecciones = DeteccionNecesidades::find($id);

        $detecciones->aceptado = $request->aceptado;

        $detecciones->save();

        return Redirect::route('index.detecciones');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deteccion = DeteccionNecesidades::with('carrera', 'deteccion_facilitador')->find($id);

        return Inertia::render('Views/desarrollo/coordinacion/ShowDeteccionCoordinacion', [
            'deteccion' => $deteccion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'observaciones' => ['required']
        ]);

        DeteccionNecesidades::where('id', $id)->update([
            'observaciones' => $request->observaciones,
            'obs' => 1
        ]);

        return Redirect::route('index.detecciones');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
