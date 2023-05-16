@extends('layout/template')
@section('title', 'Registrar Alumnos | Escuela')
@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Registrar Alumno</h2>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       <ul>
                   @foreach ($errors->all() as $error)
                       
                       <li>{{ $error }}</li>
                   @endforeach
                       </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ url('alumnos') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="matricula" class="col-sm-2 col-form.label">Matricula :</label>
                    <div class="col-sm-5">
                        <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}"
                            class="form-control" >
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombres" class="col-sm-2 col-form.label">Nombres Completos:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nombres" id="nombres" value="{{ old('nombres') }}" class="form-control"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="apellidos" class="col-sm-2 col-form.label">Apellidos Completos:</label>
                    <div class="col-sm-5">
                        <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha_nacimiento" class="col-sm-2 col-form.label">Fecha Nacimiento:</label>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento') }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form.label">Telefono :</label>
                    <div class="col-sm-5">
                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form.label">Email :</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nivel" class="col-sm-2 col-form.label">Nivel :</label>
                    <div class="col-sm-5">
                        <select name="nivel" id="nivel" class="form-select" required>
                            <option value="">-- Seleccione Nivel --</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}" value="{{ old('nivel') }}"">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </main>
