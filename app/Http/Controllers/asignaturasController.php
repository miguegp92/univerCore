<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;

class asignaturasController extends Controller
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
        $asignaturas = Asignatura::all();
        return view('asignaturas', compact("asignaturas"));
    }

    public function create(Request $request){
        $asignatura = new Asignatura();
        $asignatura->Descripcion = $request->Descripcion;
       
        if($asignatura->save()){
            return redirect('asignaturas');
        }else{
            echo "<script>alert('Ha ocurrido un error a la hora de crear la asignatura');windows.back();</script>";
        }
       
    }

    public function edit(){
        $asignatura = new Asignatura();
        //$alumno->id = $id;
        $asignatura =  $asignatura->edit($id);
    }

    public function destroy($id){
        $asignatura = Asignatura::find($id);
        $asignatura->delete();
        return redirect('asignaturas');
    }

    public function listar()
    {
        return 'Listar todas las asignaturas';
    }
}
