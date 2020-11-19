@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header pt-4 bg-white text-center">
                    <h3 class="card-title">
                        Cursos - Materias
                    </h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @if (count($subjects) !== 0)
                                @foreach ($subjects as $subject)
                                    <div class="col-md-9 col-5 mb-2">
                                        <p>{{$subject->subjectName}}</p>
                                    </div>
                                    <div class="col-md-3 col-7 mb-2">
                                        <a class="btn btn-dark mr-2" href="{{route('other.editSubject', $subject->id)}}">editar</a>
                                        <form action="{{route('other.deleteSubject', $subject->id)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                                <div class="col-md-12 mb-2 d-flex justify-content-center">
                                    <p>{{$subjects->links()}}</p>
                                </div>
                            @else
                                <div class="col-md-12">
                                    No hya materias
                                </div>
                            @endif

                            @if (count($courses) !== 0)
                                @foreach ($courses as $course)
                                    <div class="col-md-9 col-5 mb-2">
                                        <p>{{$course->courseName}}</p>
                                    </div>
                                    <div class="col-md-3 col-7 mb-2">
                                        <a class="btn btn-dark mr-2" href="{{route('other.editCourse', $course->id)}}">editar</a>
                                        <form action="{{route('other.deleteCourse', $course->id)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                                <div class="col-md-12 mb-2">
                                    <p>{{$courses->links()}}</p>
                                </div>
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