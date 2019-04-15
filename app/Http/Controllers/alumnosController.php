<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class alumnosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $alumno = new Alumno();
        $alumnos = Alumno::all();
        return view('alumnos', compact("alumnos"));
    }

    public function create(Request $request){
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->dni = $request->dni;
        $alumno->provincia = $request->provincia;
        $alumno->localidad = $request->localidad;
        $alumno->fechanacimiento = $request->fechanacimiento;
        $alumno->sexo = $request->sexo;

        if($alumno->save()){
            return redirect('alumnos');
        }else{
            echo "<script>alert('Ha ocurrido un error a la hora de crear la asignatura');windows.back();</script>";
        }
       
    }

    public function edit($id){
        $alumno = new Alumno();
        //$alumno->id = $id;
        $array =  $alumno->edit($id);
    }

    public function destroy($id){
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect('alumnos');
       // $array =   "Borrar usuario ".$id;
    }

    public function dataAlumnos($id)
    {
        //$alumno = new Alumno();
        $alumno->id = $id;
        $array = $alumno->dataUsuario($id);
        return view('dataAlumno');
    }
}
