<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;


class AlumnoController extends Controller
{
    public function index()
    {
        $total_masculinos = Alumno::where('genero','=','Masculino')->get();
        $total_femeninos = Alumno::where('genero','=','Femenino')->get();
        $total_alumnos_becados = Alumno::where('becado','=','Si')->get();
        $total_alumnos_sin_becados = Alumno::where('becado','=','No')->get();
        $total_matutino = Alumno::where('horario','=','Matutino')->get();
        $total_vespertino = Alumno::where('horario','=','Vespertino')->get();
        $total_alumnos_reprobados = Alumno::where('calificacion_prepa','<','6')->get();
        $total_alumnos_aprobados = Alumno::where('calificacion_prepa','>','6')->get();
        $total_problemas_de_salud = Alumno::where('problemas_de_salud','=','Si')->get();
        $total_sin_problemas_de_salud = Alumno::where('problemas_de_salud','=','No')->get();
        return response([
            'total_masculinos' => count($total_masculinos),
            'total_femeninos' => count($total_femeninos),
            'total_alumnos_becados' => count($total_alumnos_becados),
            'total_alumnos_sin_becados' => count($total_alumnos_sin_becados),
            'total_matutino' => count($total_matutino),
            'total_vespertino' => count($total_vespertino),
            'total_alumnos_reprobados' => count($total_alumnos_reprobados),
            'total_alumnos_aprobados' => count($total_alumnos_aprobados),
            'total_problemas_de_salud' => count($total_problemas_de_salud),
            'total_sin_problemas_de_salud' => count($total_sin_problemas_de_salud),
        ],200);
    }



    public function create(Request $request)
    {
        $data = $this->validate($request, [
            'nombre' => 'required|string',
            'edad' => 'required|string',
            'genero' => 'required',
            'carrera' => 'nullable',
            'ednia_indigena' => 'required',
            'horario' => 'required',
            'calificacion_prepa' => 'required|string',
            'becado' => 'required',
            'problemas_de_salud' => 'required',
        ]);
        Alumno::create($data);
        return response([
            'message' => 'Se creo con exito el alumno',
        ], 201);
    }

    public function show($id)
    {
        $alumno = Alumno::where('_id', $id)->first();
        return response($alumno, 200);
    }

    public function update($id, Request $request)
    {
        $data = $this->rules($request);
        Alumno::find($id)->fill($data)->save();
        return response([
            'message' => 'Se modifico con exito el alumno',
        ], 200);

    }

    public function delete($id)
    {
        Alumno::find($id)->delete();
        return response([
            'message' => 'Se elimino con exito el alumno',
        ], 200);
    }

    protected function rules($request)
    {
        return $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|string',
            'genero' => 'required',
            'carrera' => 'nullable',
        ]);
    }
}
