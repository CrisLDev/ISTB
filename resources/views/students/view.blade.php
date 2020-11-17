@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center m-3">
                    <h3 class="card-title">
                        Información del estudiante
                    </h3>
                    <h3>{{$student->fullname}}</h3>
                </div>
                <div class="card-body">
                    <div>
                        <img src="{{Gravatar::get($student->email)}}" alt="peopleGravatar">
                    </div>
                    <div>
                        <p>{{$student->fullname}}</p>
                        <p>{{$student->telephoneNumber}}</p>
                        <p>{{$student->dni}}</p>
                        <p>{{$student->address}}</p>
                        <p>{{$student->age}}</p>
                        <p>{{$student->email}}</p>
                        <p>{{$student->code}}</p>
                    </div>
                    <div class="mt-5">
                        @foreach ($grade as $item)
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Notas @foreach ($item as $course)
                                        @if ($loop->first) {{$course->courseName}} @endif
                                        @endforeach
                                    </button>
                                    </h2>
                                </div>
                            
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($item as $grade)
                                            <div>
                                                <p>Nombre de la materia</p>
                                                <p>{{$grade->subjectName}}</p>
                                                <p>Nota</p>
                                                <p>{{$grade->grade}}</p>
                                                <p>Asistencia</p>
                                                <p>{{$grade->assistance}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection