@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                     <h3>Crear reporte de actividad</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.storeReport') }}">
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
                                        value="{{old('resume')}}"
                                        maxlength="100"
                                        minlength="10"
                                        required
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Docente</label>
                                        <select id="inputState" class="form-control" name="teacher_id">
                                        @if (count($teachers) === 0)
                                            <option value="">No hay docentes</option>
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
                                            <option value="">No hay estudiantes</option>
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
                                            <option value="">No hay cursos</option>
                                        @endif
                                        @foreach ($courses as $course)
                                          <option value="{{$course->id}}">{{$course->courseName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Actividades</label>
                                        <select id="inputState" class="form-control" name="activity_id">
                                        @if (count($activities) === 0)
                                            <option>No hay actividades</option>
                                        @endif
                                        @foreach ($activities as $activity)
                                          <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="reportTextarea">Cotenido</label>
                                        <textarea class="form-control" id="reportTextarea" rows="3" name="content" placeholder="Ingresa el contenido" required>{{old('content')}}</textarea>
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