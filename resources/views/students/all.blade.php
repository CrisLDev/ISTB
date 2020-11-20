@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todos los registros de estudiantes
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" name="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @if (count($students) !== 0)

                                @foreach ($students as $student)

                                <div class="container mb-4 border-bottom">
                                    <div class="row justify-content-center">

                                <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                    <img src="{{Gravatar::get($student->email)}}" alt="peopleGravatar">
                                </div>

                                <div class="col-md-7 col-sm-12 mb-4">
                                    <p class="font-weight-bold">Nombre completo:</p>
                                    <p>{{$student->fullname}}</p>

                                    <p class="font-weight-bold">Email:</p>
                                    <p>{{$student->email}}</p>

                                    <p class="font-weight-bold">Codigo:</p>
                                    <p>{{$student->code}}</p>

                                </div>

                                <div class="col-md-3 col-sm-4 d-flex align-items-center">
                                    <a class="btn btn-info mr-2" href="{{route('students.showStudent', $student->id)}}">ver</a>
                                    <a class="btn btn-dark mr-2" href="{{route('people.editStudent', $student->id)}}">editar</a>
                                <form action="{{route('people.deleteStudent', $student->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                                </div></div>
                                </div>

                                @endforeach

                                @else

                                <div class="col-md-12">
                                    <p>No hay registros de Estudiantes</p>
                                </div>

                            @endif
                        </div>
                        <div class="container d-flex justify-content-center">
                            {{$students->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection