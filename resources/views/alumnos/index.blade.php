@extends('layout/template')
@section('title', 'Alumnos | Escuela')
@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Lista de Alumnos</h2>

            <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo Registro</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Matricula</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Opciones</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <th scope="row">{{$alumno->id}}</th>
                        <td>{{$alumno->matricula}}</td>
                        <td>{{$alumno->nombres}}</td>
                        <td>{{$alumno->apellidos}}</td>
                        <td>{{$alumno->fecha_nacimiento}}</td>
                        <td>{{$alumno->telefono}}</td>
                        <td>{{$alumno->email}}</td>
                        <td>{{$alumno->niveles->nombre}}</td>
                        <td><a href="{{url('alumnos/'.$alumno->id.'/edit')}}" class="btn btn-warning btn-sm">Editar</a></td>
                        <td>
                        <form action="{{url('alumnos/'.$alumno->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
        </div>

    </main>
