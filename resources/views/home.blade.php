@extends('layouts.app')

@section('content')
<style>
    tr.trclickable{
        cursor: pointer;
    }
</style>
<script src="{{ asset('js/ajax.js') }}" defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                <p>
                    <input type="search" id="search" class="form-control" placeholder="Introduzca el nombre del alumno o asignatura">
                </p>
                <table width="100%" id="resultSearch"></table>
                <!--
                <p>Pulse una de las siguientes opciones que desee gestionar:</p>
                  <p> <a href="{{ url('/alumnos') }}" class="link-primary">Administrar Alumnos</a> </p>
                  <p> <a href="{{ url('/asignaturas') }}" class="link">Administrar Asignaturas</a> </p>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
@endsection
