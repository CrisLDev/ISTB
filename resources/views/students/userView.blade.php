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
                                        <h3 class="mb-0">Fichas {{$item->courseName}}
                                    </button>
                                    </h2>
                                </div>
                                <div id="collapse{{$item[0]['course_id']}}" class="collapse show" aria-labelledby="heading{{$item[0]['course_id']}}" data-parent="#accordionGrades">
                                    <div class="card-body">
                                        <div class="container">
                                                <div class="container">
                                                    <p class="font-weight-bold">Curso:</p>
                                                    <p>{{$item->courseName}}</p>
                                                    <p class="font-weight-bold">Alergias:</p>
                                                    <p>{{$item->allergies}}</p>
                                                    <p class="font-weight-bold">Tratamientos:</p>
                                                    <p>{{$item->treatment}}</p>
                                                    <p class="font-weight-bold">Enfermedad cardiovascular:</p>
                                                    <p>{{$item->cardiovascular}}</p>
                                                    <p class="font-weight-bold">Piojos:</p>
                                                    <p>{{$item->lice}}</p>
                                                    <p class="font-weight-bold">Asma:</p>
                                                    <p>{{$item->asthma}}</p>
                                                    <p class="font-weight-bold">Malformaciones:</p>
                                                    <p>{{$item->malformation}}</p>
                                                    <p class="font-weight-bold">Lentes:</p>
                                                    <p>{{$item->glasses}}</p>
                                                    <p class="font-weight-bold">Observaciones:</p>
                                                    <p>{{$item->observations}}</p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container pt-3 d-flex justify-content-center">
                            {{$records->links()}}
                        </div>

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
                                            <h3 class="mb-0">Reportes
                                        </button>
                                        </h2>
                                    </div>
                                    <div id="collapseR{{$item[0]['course_id']}}" class="collapse show" aria-labelledby="headingR{{$item[0]['course_id']}}" data-parent="#accordionGrades">
                                        <div class="card-body">
                                                <div class="container-fluid border shadow pt-3 pb-3">
                                                    <p class="font-weight-bold">Nombre de la materia:</p>
                                                    <p>{{$item->subjectName}}</p>
                                                    <p class="font-weight-bold">Contenido:</p>
                                                    <p>{{$item->content}}</p>
                                                    <p class="font-weight-bold">Nombre del docente:</p>
                                                    <p>{{$item->teacherFullname}}</p>
                                                    <p class="font-weight-bold">Fecha de creación:</p>
                                                    <p>{{$item->created_at}}</p>
                                                    <div>
                                                        <a class="btn btn-dark" href="{{route('reports.editReport', $item->id)}}">editar</a>

                                                        <form action="{{route('reports.destroyReport', $item->id)}}" method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="font-weight-bold">No hay reportes</div>
                        @endif

                        <div class="container pt-3 d-flex justify-content-center">
                            {{$reports->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection