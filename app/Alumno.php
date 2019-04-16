<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Modelo para la tabla de Alumnos
class Alumno extends Model
{
    public function matricular($id){
        
    }
    public function listarMatriculadas($id){

    	return "Aqui van las matriculaciones del usuario ".$id;
    }
    public function notaMedia($id){

    	return "Aqui se calculará la nota media del usuario de todas las asignaturas ".$id;
    }
    public function dataUsuario($id){

    	return "Aqui van los datos del usuario ".$id;
    }
}
