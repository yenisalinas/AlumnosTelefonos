@extends('layout.plantilla')

@section('titulo', 'Clases')

<style>
    h1 {
        margin-bottom: 20px;
        position: relative;
    }

    h1::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #d1a3e4;
    }
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
    }

    form {
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        background-color: #fff;
        margin-left: 20px;
        margin-right: 20px;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    label {
        color: #283629;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 5px;
        text-align: left;
    }

    .ok, .select, textarea {
        padding: 10px 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        background-color: #d1a3e4; /* Morado lila pálido */
        border: 2px solid #F0FAf1;
        color: white;
        outline: none;
        width: calc(100% - 50px);
        transition: border-color 0.3s ease;
    }

    .ok:focus, .select:focus, textarea:focus {
        border-color: #61008a;
    }

    ::placeholder,
    textarea::placeholder {
        color: #b5cab6;
    }


</style>

@section('contenido')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p></p>
    <form method='post' action="{{ isset($alumno)? route('alumnos.update', $alumno->id) : route('alumnos.store')}}">
        @if(isset($alumno))
            @method('put')
        @endif
        @csrf
        <h1 style="margin-bottom: 25px">{{isset($alumno) ? "Editar Alumno" : "Nuevo Alumno"}}</h1>
        <div>
            <div class="input-group">
                <div class="row">
                    <div class="col-4">
                        <label for="nombre">Nombre del Alumno:</label>
                        <input type="text" class="ok" id="nombre" name="nombre" value="{{isset($alumno) ? $alumno->Nombre : old('nombre')}}" maxlength="50">
                    </div>
                    <div class="col-4">
                        <label for="unidades">Cuenta:</label>
                        <input type="text" maxlength="3" class="ok" id="cuenta" name="cuenta" value="{{isset($alumno) ? $alumno->Cuenta : old('cuenta')}}">
                    </div>
                    <div class="col-4">
                        <label for="codigo">Nota:</label>
                        <input type="text" class="ok" id="nota" name="nota" value="{{isset($alumno) ? $alumno->Nota : old('nota')}}" maxlength="5">
                    </div>
                    <div class="col-4">
                        <label for="codigo">Carrera:</label>
                        <input type="text" class="ok" id="carrera" name="carrera" value="{{isset($alumno) ? $alumno->Carrera : old('carrera')}}" maxlength="30">
                    </div>
                </div>
            </div>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success">{{isset($alumno) ? "Actualizar" : "Guardar"}}</button>
                <a href="{{ route('alumnos.index') }}" class="btn btn-outline-danger">Cancelar</a>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $('#codigo').mask('AA000');
            $('#unidades').mask('000');
        });
    </script>

@endsection
