<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Departamento;
use App\Models\DeteccionNecesidades;
use App\Models\Docente;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $detecciones = DeteccionNecesidades::with(['carrera', 'deteccion_facilitador'])
            ->where('aceptado', '=', 0)->where('id_jefe', auth()->user()->docente_id)->orderBy('id', 'desc')->get();


        return Inertia::render('Views/academicos/Index.Detecciones',[
            'detecciones' => $detecciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Docente::select('nombre', 'id')->get();
        $carrera = Carrera::where('departamento_id', auth()->user()->departamento_id)->select('nameCarrera', 'id', 'departamento_id')->get();
        $departamento = Departamento::all();
        return Inertia::render('Views/academicos/Create.Detecciones', [
            'base_docente' => $docentes,
            'carrera_filtro' => $carrera,
            'todos_los_departamentos' => $departamento
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'AsignaturasFA' => 'required',
            'ContenidoTFA' => 'required',
            'Numprofesores' => 'required',
            'periodo' => 'required',
            'nombreCT' => 'required',
            'fecha_I' => 'required',
            'fecha_F' => 'required',
            'hora_I' => 'required',
            'hora_F' => 'required',
            'objetivo' => 'required',
            'tipo' => 'required',
            'tipo_act' => 'required',
            'dirigido' => 'required',
            'id_jefe' => 'required',
            'modalidad' => ['required'],
        ]);

        $deteccion = DeteccionNecesidades::create([
            'asignaturaFA' => $request->AsignaturasFA,
            'contenidosTM' => $request->ContenidoTFA,
            'numeroProfesores' => $request->Numprofesores,
            'periodo' => $request->periodo,
            'nombreCurso' => $request->nombreCT,
            'fecha_I' => $request->fecha_I,
            'fecha_F' => $request->fecha_F,
            'hora_I' => $request->hora_I,
            'hora_F' => $request->hora_F,
            'objetivoEvento' => $request->objetivo,
            'tipo_FDoAP' => $request->tipo,
            'tipo_actividad' => $request->tipo_act,
            'carrera_dirigido' => $request->dirigido,
            'id_jefe' => $request->id_jefe,
            'aceptado' => 0,
            'modalidad' => $request->modalidad,
            'facilitador_externo' =>  $request->facilitador_externo
        ]);

        $deteccion->save();

        $deteccion->deteccion_facilitador()->sync($request->input('facilitadores', []));

//        User::role(['Coordinacion de FD y AP'])->each(function(User $user) use ($deteccion){
//            $user->notify(new CoordiNotifications($deteccion, $user));
//        });

        return redirect()->route('detecciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registros(){
        $detecciones = DeteccionNecesidades::with(['carrera', 'deteccion_facilitador'])
            ->where('aceptado', '=', 1)->where('id_jefe', auth()->user()->docente_id)->orderBy('id', 'desc')->get();
        return Inertia::render('Views/academicos/Index.Registros', [
            'detecciones' => $detecciones
        ]);
    }
}
