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
       
        $this->middleware('auth');
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
        $alumno = $this->rellenarCampos($request, $alumno);

        if($alumno->save()){
            return redirect('alumnos');
        }else{
            echo "<script>alert('Ha ocurrido un error a la hora de crear el alumno');windows.back(-1);</script>";
        }
       
    }

    public function edit(Request $request){
        $alumno = Alumno::find($request->id);
        $alumno = $this->rellenarCampos($request, $alumno);
        if($alumno->save()){
            return redirect('alumnos');
        }else{
            echo "<script>alert('Se ha producido un error a la hora de actualizar los datos');</script>";
        }
    }
    public function rellenarCampos($request, $alumno){

        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->dni=$request->dni;
        $alumno->localidad=$request->localidad;
        $alumno->provincia=$request->provincia;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->sexo=$request->sexo;

        return $alumno;
    }
    public function destroy($id){
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect('alumnos');
       // $array =   "Borrar usuario ".$id;
    }

    public function dataAlumnos($id)
    {
        $alumno = Alumno::find($id);
        return $alumno;
    }
}
