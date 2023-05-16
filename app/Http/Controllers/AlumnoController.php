<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Niveles;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create', ['niveles' => Niveles::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula' =>'required|max:10',
            'nombres' =>'required|max:255',
            'fecha_nacimiento' =>'required|date',
            'telefono' =>'required|max:100',
            'email' =>'nullable|email',
            'nivel' =>'required',
        ]);

        $alumno = new Alumnos();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();
        
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos= Alumnos::find($id);
        return view('alumnos.edit', ['alumnos' => $alumnos, 'niveles' => Niveles::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             'matricula' =>'required|max:10',
            'nombres' =>'required|max:255',
            'fecha_nacimiento' =>'required|date',
            'telefono' =>'required|max:100',
            'email' =>'nullable|email',
            'nivel' =>'required',
        ]);

        $alumno = Alumnos::find($id);
        $alumno->matricula = $request->input('matricula');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
