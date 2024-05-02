<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::paginate(10);
        return view('Alumnos.indexalumno', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Alumnos.formularioclase');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'cuenta' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'nota' => ['required', 'numeric', 'min:0', 'max:100'],
            'carrera' => ['required'],
        ],[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.regex' => 'El nombre solo debe contener lestras y espacios.',
            'nota.min' => 'El minimo de nota es de 0.',
            'nota.max' => 'El maximo de nota es de 100.',
            'carrera.required' => 'Carrera es obligatorio de las 5 de UNAH TEC Danli.',
        ]);

        $nuevoAlumno = new Alumno();
        $nuevoAlumno->Cuenta = $request->input('cuenta');
        $nuevoAlumno->Nombre = $request->input('nombre');
        $nuevoAlumno->Nota = $request->input('nota');
        $nuevoAlumno->Carrera = $request->input('carrera');

        if($nuevoAlumno->save()){
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'Alumno registrado con exito');
        } else {
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'Error. Alumno no se pudo guardar');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumno::findOrfail($id);
        return view('Alumnos.showalumno', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumno::findOrfail($id);
        return view('Alumnos.formularioAlumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumno::findOrFail($id);

        $request->validate([
            'nombre' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'cuenta' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'nota' => ['required', 'numeric', 'min:0', 'max:100'],
            'carrera' => ['required'],
        ],[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.regex' => 'El nombre solo debe contener lestras y espacios.',
            'nota.min' => 'El minimo de nota es de 0.',
            'nota.max' => 'El maximo de nota es de 100.',
            'carrera.required' => 'Carrera es obligatorio de las 5 de UNAH TEC Danli.',
        ]);

        $alumno ->Cuenta = $request->input('cuenta');
        $alumno ->Nombre = $request->input('nombre');
        $alumno ->Nota = $request->input('nota');
        $alumno ->Carrera = $request->input('carrera');

        $alumno->save();
        
        if($alumno->save()){
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'Alumno actualizado exitosamente');
        } else {
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'Error. No pudo actualizarse');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Alumno::destroy($id) > 0){
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'Alumno actualizado exitosamente');
        } else {
            return redirect()->route('Alumnos.indexalumno')->with('mensaje', 'El Alumno no fue borrado');
        }
    }
}
