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
                            <div class="accordion" id="accordionGrades">
                                <div class="card">
                                <div class="card-header" id="heading{{$item[0]['course_id']}}">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$item[0]['course_id']}}" aria-expanded="true" aria-controls="collapse{{$item[0]['course_id']}}">
                                        Notas @foreach ($item as $course)
                                        @if ($loop->first) {{$course->courseName}} @endif
                                        @endforeach
                                    </button>
                                    </h2>
                                </div>
                                <div id="collapse{{$item[0]['course_id']}}" class="collapse show" aria-labelledby="heading{{$item[0]['course_id']}}" data-parent="#accordionGrades">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Materia</th>
                                                    <th scope="col">Nota</th>
                                                    <th scope="col">Asistencia</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($item as $grade)
                                                  <tr>
                                                    <td>{{$grade->subjectName}}</td>
                                                    <td>{{$grade->grade}}</td>
                                                    <td>{{$grade->assistance}}</td>
                                                  </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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