@extends('layouts.app')

@section('content')
<script src="{{ asset('js/ajax.js') }}" defer></script>
<div class="container">
    <h1>Asignaturas de la Universidad</h1>
    <p>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#alumnosModal">Añadir asignatura</button>
    </p>
    <div class="row justify-content-center">
    
        <div class="col-md-8">
        @if(count($asignaturas))
            <table class="table">
                <tbody>
                @foreach($asignaturas as $elemento)
                    <tr>
                        <td>{{$elemento->Descripcion}}</td<>
                        <td class="text-right">
                            <a class="text-info" href="{{ action('asignaturasController@edit', ['id' => $elemento->id]) }}">  <i class='fas fa-pen-square'></i> Editar</a>
                            <a class="text-danger" href="{{ action('asignaturasController@destroy', ['id' => $elemento->id]) }}">  <i class='fas fa-trash-alt'></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
<div>
<div class="modal" id="alumnosModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="{{route('newLesson')}}">
         <div class="modal-header">
                <h4 class="modal-title">Añadir nueva asignatura</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><label>Nombre: </label></td>
                        <td><input type="text" class="form-control" name="Descripcion"/></td>
                    </tr>
                </table>
            {{ csrf_field() }}
            <div class="modal-footer">
                <button class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

