@extends('layout.plantilla')
@section('titulo', 'Un Alumno')

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
                <h3 class="card-title"><strong>Datos del alumno"{{ $alumno->Nombre }}"</strong></h3>
                <div id="linea" class="col-mb-12" style="height: 3px; margin-bottom: 10px; background-color: #d1a3e4;"></div>
                <p class="card-text"><strong>Nombre del Alumno:</strong> {{$alumno->Nombre}}</p>
                <p class="card-text"><strong>Carrera:</strong> {{ $alumno->Carrera }}</p>
                <p class="card-text"><strong>Cuenta:</strong> {{ $alumnoi->Cuenta }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>ALUMNOS EN REGISTRO</strong></h3>
                <div id="linea" class="col-mb-12" style="height: 3px; margin-bottom: 10px; background-color: #d1a3e4;"></div>
                    <table class="table" style="border-color: #f5edf0">
                        <thead>
                        <th>Nombre</th>
                        <th>Cuenta</th>
                        </thead>
                        <tbody>
                        @forelse($telefono->alumno as $alumno)
                        <tr>
                            <td>{{$alumno->Nombre}}</td
                            <td>{{$alumno->Cuenta}}</td>
                        </tr>
                        @empty
                            <td colspan="2">
                               Alumno no tiene Numeros
                            </td>
                        @endforelse
                        </tbody>
                    </table>

            </div>
        </div>
        <a href="{{ route('Clases.indexclase') }}" class="btn btn-outline-success">Volver</a>
    </div>
@endsection