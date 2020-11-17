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
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                              </button>
                            </h2>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                      </div>
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
                        @foreach ($grade as $item)
                            <h3>Nota</h3>
                            <p>{{$item->subjectName}} {{$item->grade}}</p>
                            <h3>Asistencia</h3>
                            <p>{{$item->subjectName}} {{$item->assistance}}</p>
                        @endforeach
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