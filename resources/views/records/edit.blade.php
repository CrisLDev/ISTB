@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                     <h3>Editar Ficha</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('records.updateRecords', $record->id) }}">
                        @method('PUT')
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputState">Estudiante</label>
                                        <select id="inputState" class="form-control" name="student_id">
                                        @if (count($students) === 0)
                                            <option value="">No hay estudiantes</option>
                                        @endif
                                        @foreach ($students as $student)
                                          <option value="{{$student->id}}" {{ $student->id == $record->student_id ? 'selected' : '' }}>{{$student->fullname}}</option>
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
                                          <option value="{{$course->id}}" {{ $course->id == $record->course_id ? 'selected' : '' }}>{{$course->courseName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="allergies">Alergias</label>
                                        <textarea type="text" class="form-control" id="allergies" name="allergies" placeholder="Ingresar las alergias" required>{{$record->allergies}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="treatment">Asistencia</label>
                                        <textarea type="text" class="form-control" id="treatment" name="treatment" placeholder="Ingrese una descripcion del tratamiento" required>{{$record->treatment}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Enfermedad Cardiovascular</label>
                                        <select id="inputState" class="form-control" id="cardiovascular" name="cardiovascular">
                                          <option value="si" {{ $record->cardiovascular == 'si' ? 'selected' : '' }}>Si</option>
                                          <option value="no" {{ $record->cardiovascular == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Piojos</label>
                                        <select id="inputState" class="form-control" id="lice" name="lice">
                                          <option value="si" {{ $record->lice == 'si' ? 'selected' : '' }}>Si</option>
                                          <option value="no" {{ $record->lice == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Asma</label>
                                        <select id="inputState" class="form-control" id="asthma" name="asthma">
                                          <option value="si" {{ $record->asthma == 'si' ? 'selected' : '' }}>Si</option>
                                          <option value="no" {{ $record->asthma == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Assistance">Malformacion</label>
                                        <textarea type="text" class="form-control" id="malformation" name="malformation" placeholder="Ingrese alguna malformacion" required>{{$record->malformation}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Lentes</label>
                                        <select id="inputState" class="form-control" id="glasses" name="glasses">
                                          <option value="si" {{ $record->glasses == 'si' ? 'selected' : '' }}>Si</option>
                                          <option value="no" {{ $record->glasses == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Assistance">Observaciones</label>
                                        <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Ingrese las observaciones" required>{{$record->observations}}</textarea>
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