@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-5 pt-4">
                     <h3>Crear Ficha</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('records.storeRecords') }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="form-text text-muted mb-3">Los campos Alergias, Tratamientos, Malformaciones y Observaciones pueden estar vacios.</h6>
                                    <div class="form-group">
                                        <label for="inputState">Estudiante</label>
                                        <select id="inputState" class="form-control" name="student_id">
                                        @if (count($students) === 0)
                                            <option value="">No hay estudiantes</option>
                                        @endif
                                        @foreach ($students as $student)
                                          <option value="{{$student->id}}+{{$student->course_id}}">{{$student->fullname}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Grades">Alergias</label>
                                        <textarea type="text" class="form-control" id="allergies" name="allergies" placeholder="Ingresar las alergias">{{old('allergies')}}</textarea>
                                    </div>
                                    <h6 class="form-text text-muted mb-3">Favor utiizar (- o ,) para separar los diferentes items.</h6>
                                    <div class="form-group">
                                        <label for="Assistance">Tratamientos</label>
                                        <textarea type="text" class="form-control" id="treatment" name="treatment" placeholder="Ingrese una descripcion del tratamiento">{{old('treatment')}}</textarea>
                                        <h6 class="form-text text-muted mb-3">Favor utiizar (- o ,) para separar los diferentes items.</h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Enfermedad Cardiovascular</label>
                                        <select id="inputState" class="form-control" id="cardiovascular" name="cardiovascular">
                                          <option value="si">Si</option>
                                          <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Piojos</label>
                                        <select id="inputState" class="form-control" id="lice" name="lice">
                                          <option value="si">Si</option>
                                          <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Asma</label>
                                        <select id="inputState" class="form-control" id="asthma" name="asthma">
                                          <option value="si">Si</option>
                                          <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Assistance">Malformacion</label>
                                        <textarea type="text" class="form-control" id="malformation" name="malformation" placeholder="Ingrese alguna malformacion">{{old('malformation')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Lentes</label>
                                        <select id="inputState" class="form-control" id="glasses" name="glasses">
                                          <option value="si">Si</option>
                                          <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Assistance">Observaciones</label>
                                        <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Ingrese las observaciones">{{old('observations')}}</textarea>
                                        <h6 class="form-text text-muted mb-3">Favor utiizar (- o ,) para separar los diferentes items.</h6>
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