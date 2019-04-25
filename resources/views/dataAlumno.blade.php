@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$alumno->nombre}} {{$alumno->apellidos}} ({{$alumno->dni}})</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h4>Asginaturas matriculadas</h4>
            <table class="table">
            @foreach($matriculadas as $matricula)
                <tr>
                    <td>{{$matricula->Descripcion}}</td>
                    <td>{{$matricula->fechaMatriculacion}}</td>
                    <td  class="text-right"><input type="number"  value="{{$matricula->notafinal}}"> <button class="btn btn-primary">Evaluar</button></td>
                </tr>
                
            @endforeach
            </table>
        </div>
        <div class="col-md-8">
            <h4>Asginaturas sin matricular</h4>
            <table class="table">
            @foreach ($noMatriculas as $matricula)
                <tr>
                    <td>{{ $matricula->descripcion }}</td>
                    <td class="text-right"> <button class="btn btn-success">Matricular</button></td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
