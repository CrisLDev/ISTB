@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center m-3">
                     <h3>Editar reporte de acividad</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('reports.updateReport', $report->id) }}">
                        @method('PUT')
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Resumen del reporte:</label>
                                        <input
                                        type="text"
                                        autocomplete="none"
                                        spellcheck="false"
                                        name="resume"
                                        id="resume"
                                        placeholder="Ingresa un mini resumen"
                                        class="form-control mb-2"
                                        value="{{$report->resume}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Docente</label>
                                        <select id="inputState" class="form-control" name="teacher_id">
                                        @if (count($teachers) === 0)
                                            <option>No hay docentes</option>
                                        @endif
                                        @foreach ($teachers as $teacher)
                                          <option value="{{$teacher->id}}" {{ $teacher->id == $report->teacher_id ? 'selected' : '' }}>{{$teacher->fullname}}</option>
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
                                          <option value="{{$student->id}}" {{ $student->id == $report->student_id ? 'selected' : '' }}>{{$student->fullname}}</option>
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
                                          <option value="{{$course->id}}" {{ $course->id == $report->course_id ? 'selected' : '' }}>{{$course->courseName}}</option>
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
                                          <option value="{{$subject->id}}" {{ $subject->id == $report->subject_id ? 'selected' : '' }}>{{$subject->subjectName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="reportTextarea">Cotenido</label>
                                        <textarea class="form-control" id="reportTextarea" rows="3" name="content">{{$report->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                            <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                            <span id="btex">Envair</span></button>
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