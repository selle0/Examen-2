<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request){
        //Paginado de usuarios
        //$usuarios = Usuario::paginate(2);
        //return $usuarios;

        //$queryMateria = $request->query('materia');
        //$queryEdad = $request->query('edad');
        //$queryId = $request->query('id');
        //$usuarios = Usuario::where('materia',$queryMateria)->get();

        //$usuarios = Usuario::where('materia', 'LIKE', '%' .$queryMateria. '%')->where('edad', 'LIKE', '%' .$queryEdad. '%')
        //->where('id', 'LIKE', '%' .$queryId. '%')->get();

        //$usuarios = Usuario::where('materia', 'LIKE', '%' .$queryMateria. '%')->get();
        //FILTRO DE DATOS
        //$query = $request -> query('genero');
        //return $query;

        //OBTENER TODOS LOS USUARIOS
        $usuarios = Usuario::all();

        //SENTENCIA WHERE
        $total_masculinos = Usuario::where('genero','=','Masculino')->get()->count();
        $total_femeninos = Usuario::where('genero','=','Femenino')->get()->count();
        $total_alumnos_becados = Usuario::where('becado','=','Si')->get()->count();
        $total_alumnos_sin_becados = Usuario::where('becado','=','No')->get()->count();
        $total_matutino = Usuario::where('horario','=','Matutino')->get()->count();
        $total_vespertino = Usuario::where('horario','=','Vespertino')->get()->count();
        $total_alumnos_reprobados = Usuario::where('calificacion_prepa','<','6')->get()->count();
        $total_alumnos_aprobados = Usuario::where('calificacion_prepa','>','6')->get()->count();
        $total_problemas_de_salud = Usuario::where('problemas_de_salud','=','Si')->get()->count();
        $total_sin_problemas_de_salud = Usuario::where('problemas_de_salud','=','No')->get()->count();

        //$empleados_activos_masculinos = Usuario::where('estatus','=','Activo')->where('genero','=','Masculino')->get()->count();
        //$empleados_inactivos_femeninos = Usuario::where('estatus','=','Inactivo')->where('genero','=','Femenino')->get()->count();

        //SENTENCIA PARA CONTAR TODOS LOS USUARIOS DE LA BASE DE DATOS
        //$usuarios = Usuario::count();

        //SENTENCIA WHERE
        //$usuarios = Usuario::where('nombre','=','Jose')->orwhere('materia','=','tics')->get();

        return response(['total_Masculino: '=>$total_masculinos,
                         'total_Femenino: '=>$total_femeninos,
                         'total_alumnos_becados: '=>$total_alumnos_becados,
                         'total_alumnos_sin_becados: '=>$total_alumnos_sin_becados,
                         'total_matutino: '=>$total_matutino,
                         'total_vespertino: '=>$total_vespertino,
                         'total_alumnos_reprobados: '=>$total_alumnos_reprobados,
                         'total_alumnos_aprobados: '=>$total_alumnos_aprobados,
                         'total_problemas_de_salud: '=>$total_problemas_de_salud,
                         'total_sin_problemas_de_salud: '=>$total_sin_problemas_de_salud,
                        ]);
        return $usuarios;
    }

    public function create(Request $request){
        $data = $this->rules($request);

        Usuario::create($data);
        return response([
            'message'=>'Se creo con exito el usuario'
        ],201);
    }

    public function show($id){
        $usuario=Usuario::find($id);
        return response($usuario);
    }

    public function edit($id, Request $request){
        $data = $this->rules($request);

        Usuario::find($id)->fill($data)->save();
        return response([
            'message'=>'Se modifico el usuario con exito'
        ],201);
    }

    public function delete($id){
        Usuario::find($id)->delete();
        return response([
            'message'=>'Se elimino el usuario con exito'
        ],201);
    }

    public function rules($request){
        return $this->validate ($request,[
            'nombre'=>'required|string',
            'materia'=>'required|string',
            'edad'=>'required|numeric'
        ]);
    }

    public function estadisticass($request){
        $usuario=Usuario::count();
        return $usuario;
    }
}
