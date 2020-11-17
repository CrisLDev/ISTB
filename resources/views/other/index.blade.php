@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Cursos - Materias
                    </h3>
                    @if ( session('userErrors') )
                        <div class="alert alert-danger">{{ session('userErrors')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @if (count($subjects) !== 0)
                                @foreach ($subjects as $subject)
                                    <div class="col-md-10">
                                        <p>{{$subject->subjectName}}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-dark mr-2" href="{{route('other.editSubject', $subject->id)}}">editar</a>
                                        <form action="{{route('people.deleteSubject', $subject->id)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    No hya materias
                                </div>
                            @endif

                            @if (count($courses) !== 0)
                                @foreach ($courses as $course)
                                    <div class="col-md-10">
                                        <p>{{$course->courseName}}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>{{$course->courseName}}</p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    No hya cursos
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection