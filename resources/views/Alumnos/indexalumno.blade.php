@extends('layout.plantilla')
@section('titulo', ' Alumno')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f0f0;
        justify-content: center;
    }

    .container {
        text-align: left; /* Alineado a la izquierda */
        width: 80%;
        position: relative;
    }

    .card {
        background-color: #f5edf0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 50rem;
        margin-bottom: 20px;
    }

    h3 {
        margin-bottom: 20px;
        color: #581845;
    }

    .card-text {
        color: #333;
    }

    .btn {
        margin-top: 20px;
    }
</style>

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>Datos del Alumno "{{ $alumnos->Nombre }}"</strong></h3>
                <div id="linea" class="col-mb-12" style="height: 3px; margin-bottom: 10px; background-color: #d1a3e4;"></div>
                <p class="card-text"><strong>Nombre del Alumno:</strong> {{$alumnos->Nombre}}</p>
                <p class="card-text"><strong>Id:</strong> {{$alumnos->Cuenta}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>Lista de numeros</strong></h3>
                <div id="linea" class="col-mb-12" style="height: 3px; margin-bottom: 10px; background-color: #d1a3e4;"></div>
                <table class="table" style="border-color: #f5edf0">
                    <thead>
                    <th>Numero</th>
                    </thead>
                    <tbody>
                    @forelse($telefono->telefono as $telefono)
                        <tr>
                            <td>{{$telefono->telefono}}</td>
                        </tr>
                    @empty
                        <td colspan="2">
                            La estudiante no tiene numero
                        </td>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <a href="{{ route('estudiantes.indexestudiante') }}" class="btn btn-outline-success">Volver</a>
    </div>
@endsection
