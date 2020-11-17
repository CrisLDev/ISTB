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
                        <h3>Usuario Creador</h3>
                        <p>{{$grade[0]->userName}}</p>
                        <p>{{$grade[0]->userEmail}}</p>
                    </div>
                    <div class="mt-5">
                        <h3>Nota</h3>
                        <p>{{$grade[0]->subjectName}} {{$grade[0]->grade}}</p>
                        <h3>Asistencia</h3>
                        <p>{{$grade[0]->subjectName}} {{$grade[0]->assistance}}</p>
                    </div>
                    <div class="mt-5">
                        <h3>Docente</h3>
                        <p>{{$grade[0]->teacherFullname}}</p>
                    </div>
                    <div class="mt-5">
                        <h3>Curso</h3>
                        <p>{{$grade[0]->courseName}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection