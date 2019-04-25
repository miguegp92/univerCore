<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
//Modelo para la tabla de Alumnos
class Alumno extends Model
{
    public function matricular($id){
        
    }
    public function listarMatriculadas($id){
        $q = DB::table('matriculaciones')
            ->join('asignaturas', 'matriculaciones.codigoAsignatura', '=', 'asignaturas.id')
            ->select('matriculaciones.codigoMatricula', 'asignaturas.Descripcion', 
                'matriculaciones.fechaMatriculacion', 'matriculaciones.notafinal')
            ->where('matriculaciones.codigoAlumno', $id)
            ->get();

    	return $q;
    }

    public function listAsigPendientes($id){
      
        $q2 = DB::select('SELECT id, descripcion FROM asignaturas where id not in
            (SELECT codigoMatricula FROM matriculaciones where codigoAlumno =?)', [$id]);
        
    	return json_encode($q2);
    }

    public function notaMedia($id){

    	return "Aqui se calculará la nota media del usuario de todas las asignaturas ".$id;
    }

}
