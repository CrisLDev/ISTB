@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-5 pt-4">
                     <h3>Crear Calificación</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('grades.storeGrades') }}">
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
                                          <option value="{{$student->id}}">{{$student->fullname}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Curso</label>
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
                                      <h4>Actividades</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Número</th>
                                                    <th scope="col">Actividad</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Cumplido</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <th scope="row">1</th>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <select class="custom-select" name="activity1_id" required>
                                                          @if (count($activities) === 0)
                                                              <option value="">No hay actividades</option>
                                                          @endif
                                                          @foreach ($activities as $activity)
                                                            <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <textarea class="form-control" rows="1" name="activity1"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <select class="custom-select" name="answer1" required>
                                                          <option selected value="null">Escoge uno...</option>
                                                          <option value="si">Si</option>
                                                          <option value="no">No</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">2</th>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="activity2_id" required>
                                                          @if (count($activities) === 0)
                                                              <option value="">No hay actividades</option>
                                                          @endif
                                                          @foreach ($activities as $activity)
                                                            <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" rows="1" name="activity2"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer2" required>
                                                          <option selected value="null">Escoge uno...</option>
                                                          <option value="si">Si</option>
                                                          <option value="no">No</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">3</th>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="activity3_id" required>
                                                          @if (count($activities) === 0)
                                                              <option value="">No hay actividades</option>
                                                          @endif
                                                          @foreach ($activities as $activity)
                                                            <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity3" rows="1"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer3" required>
                                                          <option selected value="null">Escoge uno...</option>
                                                          <option value="si">Si</option>
                                                          <option value="no">No</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">4</th>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="activity4_id" required>
                                                          @if (count($activities) === 0)
                                                              <option value="">No hay actividades</option>
                                                          @endif
                                                          @foreach ($activities as $activity)
                                                            <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity4" rows="1"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer4" required>
                                                          <option selected value="null">Escoge uno...</option>
                                                          <option value="si">Si</option>
                                                          <option value="no">No</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">5</th>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="activity5_id" required>
                                                          @if (count($activities) === 0)
                                                              <option value="">No hay actividades</option>
                                                          @endif
                                                          @foreach ($activities as $activity)
                                                            <option value="{{$activity->id}}">{{$activity->activityName}}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity5" rows="1"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer5" required>
                                                          <option selected value="null">Escoge uno...</option>
                                                          <option value="si">Si</option>
                                                          <option value="no">No</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
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