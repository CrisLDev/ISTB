@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todos los registros de docentes
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
                            @if (count($teachers) !== 0)

                                @foreach ($teachers as $teacher)
                                <div class="container mb-4 border-bottom">
                                    <div class="row justify-content-center">
                                <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                    <img src="{{Gravatar::get($teacher->email)}}" alt="peopleGravatar">
                                </div>

                                <div class="col-lg-7 col-md-10 col-sm-12 mb-4">
                                    <p class="font-weight-bold">Nombre completo:</p>
                                    <p>{{$teacher->fullname}}</p>

                                    <p class="font-weight-bold">Email:</p>
                                    <p>{{$teacher->email}}</p>

                                    <p class="font-weight-bold">Codigo:</p>
                                    <p>{{$teacher->code}}</p>

                                    <p class="font-weight-bold">Fecha de nacimiento:</p>
                                    <p>{{$teacher->birthDate}}</p>

                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-2 d-flex align-items-center mb-5">
                                    <a class="btn btn-dark mr-2" href="{{route('people.editTeacher', $teacher->id)}}">editar</a>
                                <form action="{{route('people.deleteTeacher', $teacher->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                                @endforeach

                                @else

                                <div class="col-md-12">
                                    <p>No hay registros de Docentes</p>
                                </div>

                                @endif
                        </div>
                        <div class="container d-flex justify-content-center">
                            {{$teachers->links()}}
                        </div>
            </div>
        </div>
    </div>
</div>

@endsection