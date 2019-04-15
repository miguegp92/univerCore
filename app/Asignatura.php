<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    //Modelo para la tabla de las asignaturas
    
    public function listar(){
        return ["Listar todas las asignaturas"];
    }
    public function create(){
        return "Crear nueva asignatura";
    }

    public function edit($asignatura){
        return "Editar asignatura ".$asignatura;
    }
    /*
    public function delete($asignatura){
        return "Borrar asignatura ".$asignatura;
    }
    */
    public function listarAlumnos($asignatura){

    	return "Todos los usuarios matriculados";

    }
    public function listarAprobados($asignatura){

    	return "Todos los usuarios que han aprobado la materia";

    }
    public function listarSuspensos($asignatura){

    	return "Todos los usuarios que han suspendido la materia";

    }
    
    public function evaluar($asignatura, $alumno){

    }
}
