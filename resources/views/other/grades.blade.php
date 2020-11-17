@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center m-3">
                     <h3>Crear Nota</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.storeGrade') }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputState">Docente</label>
                                        <select id="inputState" class="form-control" name="teacher_id">
                                        @if (count($teachers) === 0)
                                            <option>No hay docentes</option>
                                        @endif
                                        @foreach ($teachers as $teacher)
                                          <option value="{{$teacher->id}}">{{$teacher->fullname}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Estudiante</label>
                                        <select id="inputState" class="form-control" name="student_id">
                                        @if (count($students) === 0)
                                            <option>No hay docentes</option>
                                        @endif
                                        @foreach ($students as $student)
                                          <option value="{{$student->id}}">{{$student->fullname}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Cursos</label>
                                        <select id="inputState" class="form-control" name="course_id">
                                        @if (count($courses) === 0)
                                            <option>No hay docentes</option>
                                        @endif
                                        @foreach ($courses as $course)
                                          <option value="{{$course->id}}">{{$course->courseName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Materias</label>
                                        <select id="inputState" class="form-control" name="subject_id">
                                        @if (count($subjects) === 0)
                                            <option>No hay materias</option>
                                        @endif
                                        @foreach ($subjects as $subject)
                                          <option value="{{$subject->id}}">{{$subject->subjectName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Grades">Nota</label>
                                        <input type="text" class="form-control" id="Grades" name="grade" placeholder="Ingresa el valor en decimal">
                                    </div>
                                    <div class="form-group">
                                        <label for="Assistance">Asistencia</label>
                                        <input type="text" class="form-control" id="Assistance" name="assistance" placeholder="Ingresa el valor en decimal">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" id="button-prevent-multiple-submits" type="submit">
                                            <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                            <span id="btex">Crear</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection