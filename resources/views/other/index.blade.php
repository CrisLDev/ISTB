@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-5">
            <div class="card mb-5">
                <div class="card-header pt-4 bg-white text-center">
                    <h3 class="card-title">
                        Cursos - Actividades
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Nombre de la materia" name="activityName" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nombre del curso" name="courseName" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @if (count($activities) !== 0)
                                @foreach ($activities as $activity)
                                <div class="container border-bottom mb-4 pb-4">
                                    <div class="row">
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <p>{{$activity->activityName}}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <a class="btn btn-dark mr-2" href="{{route('other.editActivity', $activity->id)}}">editar</a>
                                        <form action="{{route('other.deleteActivity', $activity->id)}}" method="POST" class="d-inline">
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
                                <div class="container d-flex justify-content-center">
                                    <p>{{$activities->links()}}</p>
                                </div>
                            @else
                                <div class="col-md-12">
                                    No hya materias
                                </div>
                            @endif

                            <div class="col-md-12 mb-4"><hr></div>

                            @if (count($courses) !== 0)
                                @foreach ($courses as $course)
                                <div class="container pb-4 mb-4 border-bottom">
                                    <div class="row">
                                    <div class="col-lg-9 col-md-9 col-12">
                                        <span class="font-weight-bold">Nombre del curso:</span>
                                        <p>{{$course->courseName}}</p>
                                        <span class="font-weight-bold">Rango de edad del curso:</span>
                                        <p>{{$course->ageRange}}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <a class="btn btn-dark mr-2" href="{{route('other.editCourse', $course->id)}}">editar</a>
                                        <form action="{{route('other.deleteCourse', $course->id)}}" method="POST" class="d-inline">
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
                                <div class="container d-flex justify-content-center">
                                    <p>{{$courses->links()}}</p>
                                </div>
                            @else
                                <div class="col-md-12">
                                    No hay cursos
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection