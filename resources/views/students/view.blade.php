@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Información del estudiante
                    </h3>
                    <h3>{{$student->fullname}}</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="mb-3" src="{{Gravatar::get($student->email)}}" alt="peopleGravatar">
                    </div>
                    <div>
                        <p class="font-weight-bold">Nombre completo:</p>
                        <p>{{$student->fullname}}</p>
                        <p class="font-weight-bold">Número de teléfono:</p>
                        <p>{{$student->telephoneNumber}}</p>
                        <p class="font-weight-bold">Nombre de cédula:</p>
                        <p>{{$student->dni}}</p>
                        <p class="font-weight-bold">Direccion:</p>
                        <p>{{$student->address}}</p>
                        <p class="font-weight-bold">Eddad:</p>
                        <p>{{$student->age}}</p>
                        <p class="font-weight-bold">Email:</p>
                        <p>{{$student->email}}</p>
                        <p class="font-weight-bold">Codigo:</p>
                        <p>{{$student->code}}</p>
                    </div>
                    <div class="mt-5">
                        @if (count($records) == 0)
                            <div class="font-weight-bold">No exister fichas</div>
                        @else
                        @foreach ($records as $item)
                            <div class="accordion" id="accordionGrades">
                                <div class="card mb-4">
                                <div class="card-header bg-white" id="heading{{$item[0]['course_id']}}">
                                    <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$item[0]['course_id']}}" aria-expanded="true" aria-controls="collapse{{$item[0]['course_id']}}">
                                        <h3 class="mb-0">Fichas @foreach ($item as $course)
                                            @if ($loop->first) {{$course->courseName}} @endif
                                            @endforeach</h3>
                                    </button>
                                    </h2>
                                </div>
                                <div id="collapse{{$item[0]['course_id']}}" class="collapse show" aria-labelledby="heading{{$item[0]['course_id']}}" data-parent="#accordionGrades">
                                    <div class="card-body">
                                        <div class="container">
                                            @foreach ($item as $record)
                                                <div class="container">
                                                    <p class="font-weight-bold">Curso:</p>
                                                    <p>{{$record->courseName}}</p>
                                                    <p class="font-weight-bold">Alergias:</p>
                                                    <p>{{$record->allergies}}</p>
                                                    <p class="font-weight-bold">Tratamientos:</p>
                                                    <p>{{$record->treatment}}</p>
                                                    <p class="font-weight-bold">Enfermedad cardiovascular:</p>
                                                    <p>{{$record->cardiovascular}}</p>
                                                    <p class="font-weight-bold">Piojos:</p>
                                                    <p>{{$record->lice}}</p>
                                                    <p class="font-weight-bold">Asma:</p>
                                                    <p>{{$record->asthma}}</p>
                                                    <p class="font-weight-bold">Malformaciones:</p>
                                                    <p>{{$record->malformation}}</p>
                                                    <p class="font-weight-bold">Lentes:</p>
                                                    <p>{{$record->glasses}}</p>
                                                    <p class="font-weight-bold">Observaciones:</p>
                                                    <p>{{$record->observations}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="mt-5">
                        @if (count($reports) !== 0)
                            @foreach ($reports as $item)
                                <div class="accordion" id="accordionGrades">
                                    <div class="card mb-4">
                                    <div class="card-header bg-white" id="headingR{{$item[0]['course_id']}}">
                                        <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseR{{$item[0]['course_id']}}" aria-expanded="true" aria-controls="collapseR{{$item[0]['course_id']}}">
                                            <h3 class="mb-0">Reportes @foreach ($item as $course)
                                                @if ($loop->first) {{$course->courseName}} @endif
                                                @endforeach</h3>
                                        </button>
                                        </h2>
                                    </div>
                                    <div id="collapseR{{$item[0]['course_id']}}" class="collapse show" aria-labelledby="headingR{{$item[0]['course_id']}}" data-parent="#accordionGrades">
                                        <div class="card-body">
                                            @foreach ($item as $report)
                                                <div class="container-fluid border shadow pt-3 pb-3">
                                                    <p class="font-weight-bold">Nombre de la materia:</p>
                                                    <p>{{$report->subjectName}}</p>
                                                    <p class="font-weight-bold">Contenido:</p>
                                                    <p>{{$report->content}}</p>
                                                    <p class="font-weight-bold">Nombre del docente:</p>
                                                    <p>{{$report->teacherFullname}}</p>
                                                    <p class="font-weight-bold">Fecha de creación:</p>
                                                    <p>{{$report->created_at}}</p>
                                                    <div>
                                                        <a class="btn btn-dark" href="{{route('reports.editReport', $report->id)}}">editar</a>

                                                        <form action="{{route('reports.destroyReport', $report->id)}}" method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="font-weight-bold">No hay reportes</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection