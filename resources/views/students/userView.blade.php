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
                        <h3>{{ $student->fullname }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            @if ($student->imgUrl)
                                <img class="w-25 mb-3" src="/storage/peopleImage/{{ $student->imgUrl }}"
                                    alt="peopleGravatar">
                            @else
                                <img class="w-25 mb-3" src="/assets/nouse.png" alt="peopleGravatar">
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('assitance.index', $student->id) }}" style="text-decoration: none">
                                <p class="font-weight-bold">Faltas: <span
                                        class="badge badge-primary">{{ $assistances }}</span> <span
                                        class="text-muted">(Click aquí para ver todo.)</span></p>
                            </a>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" href="{{ route('grades.gradesByStudent', $student->id) }}"
                                    style="text-decoration: none">Notas</a>
                            </div>
                            <p class="font-weight-bold">Nombre completo:</p>
                            <p>{{ $student->fullname }}</p>
                            <p class="font-weight-bold">Número de teléfono:</p>
                            <p>0{{ $student->telephoneNumber }}</p>
                            <p class="font-weight-bold">Nombre de cédula:</p>
                            <p>{{ $student->dni }}</p>
                            <p class="font-weight-bold">Direccion:</p>
                            <p>{{ $student->address }}</p>
                            <p class="font-weight-bold">Edad:</p>
                            <p>{{ $student->age }}</p>
                            <p class="font-weight-bold">Email:</p>
                            <p>{{ $student->email }}</p>
                            <p class="font-weight-bold">Codigo:</p>
                            <p>{{ $student->code }}</p>
                            <p class="font-weight-bold">Fecha de nacimiento:</p>
                            <p>{{ $student->birthDate }}</p>
                            <p class="font-weight-bold">Nombre del padre:</p>
                            <p>{{ $student->fatherName }}</p>
                            <p class="font-weight-bold">Numero de cedula del padre:</p>
                            <p>{{ $student->dniFather }}</p>
                            <p class="font-weight-bold">Nombre de la madre:</p>
                            <p>{{ $student->motherName }}</p>
                            <p class="font-weight-bold">Numero de cedula de la madre:</p>
                            <p>{{ $student->dniMother }}</p>
                            <p class="font-weight-bold">Carnet de vacunacion:</p>
                            @if ($student->vaccinationCard)
                                <p><a class="font-weight-bold"
                                        href="/storage/peopleDocs/{{ $student->vaccinationCard }}">Ver</a></p>
                            @else
                                <p><a class="font-weight-bold"
                                        href="http://www.jfk.edu.ec/jfk/images/librospdf/J.K._Rowling_-_1Harry_Potter_y_la_Piedra_filosofal.pdf">Ver</a>
                                </p>
                            @endif
                            <p class="font-weight-bold">Acta de compromiso:</p>
                            @if ($student->memorandumOfAssociation)
                                <p><a class="font-weight-bold"
                                        href="/storage/peopleDocs/{{ $student->memorandumOfAssociation }}">Descargar</a>
                                </p>
                            @else
                                <p><a class="font-weight-bold"
                                        href="http://www.jfk.edu.ec/jfk/images/librospdf/J.K._Rowling_-_1Harry_Potter_y_la_Piedra_filosofal.pdf">Descargar</a>
                                </p>
                            @endif
                            <p class="font-weight-bold">Nombre del curso:</p>
                            <p>{{ $course->courseName }}</p>
                            <p class="font-weight-bold">Horario de clases:</p>
                            <p>{{ $course->startDate }} - {{ $course->endDate }}</p>
                            <p class="font-weight-bold">Estado:</p>
                            <p>{{ $student->status }}</p>
                        </div>
                        <div class="mt-5">
                            @if (count($records) == 0)
                                <div class="container">
                                    <div class="font-weight-bold">No existen fichas</div>
                                </div>
                            @else
                                @foreach ($records as $item)
                                    <div class="accordion" id="accordionGrades">
                                        <div class="card mb-4">
                                            <div class="card-header bg-white" id="heading{{ $item->course_id }}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-block text-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{ $item->course_id }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{ $item->course_id }}">
                                                        <h3 class="mb-0">Fichas {{ $item->courseName }}
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapse{{ $item->course_id }}" class="collapse show"
                                                aria-labelledby="heading{{ $item->course_id }}"
                                                data-parent="#accordionGrades">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="container">
                                                            <p class="font-weight-bold">Curso:</p>
                                                            <p>{{ $item->courseName }}</p>
                                                            <p class="font-weight-bold">Alergias:</p>
                                                            @if ($item->allergies !== null)
                                                                <p>{{ $item->allergies }}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                            <p class="font-weight-bold">Tratamientos:</p>
                                                            @if ($item->treatment !== null)
                                                                <p>{{ $item->treatment }}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                            <p class="font-weight-bold">Enfermedad cardiovascular:</p>
                                                            <p>{{ $item->cardiovascular }}</p>
                                                            <p class="font-weight-bold">Piojos:</p>
                                                            <p>{{ $item->lice }}</p>
                                                            <p class="font-weight-bold">Asma:</p>
                                                            <p>{{ $item->asthma }}</p>
                                                            <!--<p class="font-weight-bold">Malformaciones:</p>
                                                            @if ($item->malformation !== null)
                                                            <p>{{ $item->malformation }}</p>
                                                    @else
                                                            <p>N/A</p>
                                                            @endif-->
                                                            <p class="font-weight-bold">Lentes:</p>
                                                            <p>{{ $item->glasses }}</p>
                                                            <p class="font-weight-bold">Observaciones:</p>
                                                            @if ($item->observations !== null)
                                                                <p>{{ $item->observations }}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                            <div>
                                                                <a class="btn btn-dark"
                                                                    href="{{ route('records.editRecords', $item->id) }}">editar</a>

                                                                <form
                                                                    action="{{ route('records.destroyRecords', $item->id) }}"
                                                                    method="POST" class="d-inline">
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
                                    </div>
                                @endforeach
                                <div class="container pt-3 d-flex justify-content-center">
                                    {{ $records->links() }}
                                </div>

                            @endif

                        </div>
                        <div class="mt-5">
                            @if (count($reports) !== 0)
                                <div class="accordion" id="accordionGrades">
                                    <div class="card mb-4">
                                        <div class="card-header bg-white" id="headingR">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                                    data-target="#collapseR" aria-expanded="true" aria-controls="collapseR">
                                                    <h3 class="mb-0">Reportes
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseR" class="collapse show" aria-labelledby="headingR"
                                            data-parent="#accordionGrades">
                                            <div class="card-body">
                                                <div class="container-fluid border shadow p-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Contenido</th>
                                                                    <th scope="col">Nombre del docente</th>
                                                                    <th scope="col">Fecha de creación</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($reports as $item)
                                                                    <tr>
                                                                        <td>{{ $item->content }}</td>
                                                                        <td>{{ $item->teacherFullname }}</td>
                                                                        <td>{{ $item->created_at }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="container">
                                    <div class="font-weight-bold">No hay reportes</div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-5">
                            @if (count($dailyActivities) !== 0)
                                <div class="accordion" id="accordionGrades">
                                    <div class="card mb-4">
                                        <div class="card-header bg-white" id="headingA">
                                            <h2 class="mb-0">
                                                Actividad
                                            </h2>
                                        </div>
                                        <div id="collapseA" class="collapse show" aria-labelledby="headingA"
                                            data-parent="#accordionGrades">
                                            <div class="card-body">
                                                <div class="container-fluid border shadow pt-3 pb-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nombre de la actividad general</th>
                                                                    <th scope="col">Nombre de la actividad</th>
                                                                    <th scope="col">Calificación de la actividad</th>
                                                                    <th scope="col">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dailyActivities as $item)
                                                                    <tr>
                                                                        <td>
                                                                            @if ($item->activity_id)
                                                                                {{ $item->activity_id }}
                                                                            @else
                                                                                N/A
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($item->dailyActivityText)
                                                                                {{ $item->dailyActivityText }}
                                                                            @else
                                                                                N/A
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($item->dailyActivityCheck)
                                                                                {{ $item->dailyActivityCheck }}
                                                                            @else
                                                                                N/A
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($item->created_at)
                                                                                {{ $item->created_at->format('d-m-Y') }}
                                                                            @else
                                                                                N/A
                                                                            @endif
                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="container">
                                    <div class="font-weight-bold">No hay actividades diarias</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
