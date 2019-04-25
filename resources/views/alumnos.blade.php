@extends('layouts.app')

@section('content')
<script src="{{ asset('js/ajax.js') }}" defer></script>
<div class="container">
    <h1>Gestión de alumnos</h1>
    <p>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#alumnosModal">Añadir nuevo alumno</button>
    </p>
    <div class="justify-content-center">
        
            @if(count($alumnos))
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Nombre Alumno</th>
                        <th>DNI</th>
                        <th>Localidad</th>
                        <th></th>
                    </thead>
                    @foreach($alumnos as $elemento)
                        <tr id="{{$elemento->id}}">
                            <td>{{$elemento->nombre}} {{$elemento->apellidos}} </td>
                            <td>{{$elemento->dni}}</td>
                            <td>{{$elemento->localidad}} ({{$elemento->provincia}})</td>
                            <td class="text-center">
                            <a class="text-success btn"  href="{{ action('alumnosController@eval', ['id' => $elemento->id]) }}"> <i class='fas fa-check'></i> Evaluar</a>
                               <!-- <a class="text-info" id="" class="clickable" data-toggle="modal" data-target="#alumnosModal" href="{{ action('alumnosController@edit', ['id' => $elemento->id]) }}">  <i class='fas fa-pen-square'></i> Editar</a>-->
                                <button class="btn btn-link clickable" id="alumnos" data-toggle="modal" data-target="#alumnosEdit"><i class='fas fa-pen-square'></i> Editar</button>
                                <a class="text-danger btn" href="{{ action('alumnosController@destroy', ['id' => $elemento->id]) }}"> <i class='fas fa-trash-alt'></i>Eliminar</a>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
    </div>
</div>


<div class="modal" id="alumnosModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="{{route('newAlumno')}}">
            <div class="modal-header">
                <h4 class="modal-title">Añadir nuevo Alumno</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <table  class="table">
                <tr>
                    <td><label>Nombre: </label></td>
                    <td><input type="text" class="form-control" name="nombre"/></td>
                </tr>
                <tr>
                    <td><label>Apellidos: </label></td>
                    <td><input type="text" class="form-control"  name="apellidos"/></td>
                </tr>
                <tr>
                    <td><label>DNI: </label></td>
                    <td><input type="text" class="form-control"  name="dni"/></td>
                </tr>
                <tr>
                    <td><label>Fecha nacimiento: </label></td>
                    <td><input type="date" class="form-control"  name="fechanacimiento"/></td>
                </div>
                <tr>
                    <td colspan="2">
                        <label><input type="radio" name="sexo" value="H">H</label>
                        <label><input type="radio" name="sexo" value="M">M</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Localidad: </label></td>
                    <td><input type="text" class="form-control"  name="localidad"/></td>
                </tr>
                <tr>
                    <td><label>Provincia: </label></td>
                    <td><input type="text" class="form-control"  name="provincia"/></td>
                </tr>
                {{ csrf_field() }}
            </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="modal" id="alumnosEdit">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="{{route('editAlumno')}}">
            <input type="hidden" id="alumnosId" name="id">
            <div class="modal-header">
                <h4 class="modal-title">Editar Alumno</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <table  class="table">
                <tr>
                    <td><label>Nombre: </label></td>
                    <td><input type="text" id="editarNombre" class="form-control" name="nombre"/></td>
                </tr>
                <tr>
                    <td><label>Apellidos: </label></td>
                    <td><input type="text" id="editarApellidos" class="form-control"  name="apellidos"/></td>
                </tr>
                <tr>
                    <td><label>DNI: </label></td>
                    <td><input type="text" id="editarDNI" class="form-control"  name="dni"/></td>
                </tr>
                <tr>
                    <td><label>Fecha nacimiento: </label></td>
                    <td><input type="date" class="form-control" id="editarFecha"  name="fechanacimiento"/></td>
                </div>
                <tr>
                    <td colspan="2">
                        <label><input type="radio" name="sexo" id="editarH" value="H">H</label>
                        <label><input type="radio" name="sexo" id="editarM" value="M">M</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Localidad: </label></td>
                    <td><input type="text" class="form-control"  id="editarlocalidad" name="localidad"/></td>
                </tr>
                <tr>
                    <td><label>Provincia: </label></td>
                    <td><input type="text" class="form-control" id="editarprovincia" name="provincia"/></td>
                </tr>
                {{ csrf_field() }}
            </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning">Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
