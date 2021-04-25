@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-4 pt-4">
                     <h3>Crear Calificación</h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('students.updateGradeByDate', [$id, $date]) }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="inputState">Para borrar la inasistencia solo tiene que vaciar este campo</label>
                                        @if ($assistances)
                                          <input type="text" class="form-control" name="justification" placeholder="Escriba la justificación" value="{{$assistances->justification}}" minlength="6">
                                          <input type="hidden" name="assistanceId" value="{{$assistances->id}}" id="assistanceId">
                                        @else
                                          <input type="text" class="form-control" name="justification" placeholder="Escriba la justificación" minlength="6">
                                        @endif
                                      </div>
                                    <div class="form-group">
                                      <h4>Actividades</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Número</th>
                                                    <th scope="col">Actividad General</th>
                                                    <th scope="col">Actividad Diaria</th>
                                                    <th scope="col">Cumplido</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @forelse ($activities as $item)
                                                  <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <input type="hidden" name="id{{$loop->iteration}}" value="{{$item->id}}">
                                                        </input>
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity{{$loop->iteration}}_id" value="{{$item->activity_id}}">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <textarea class="form-control" rows="1" name="activity{{$loop->iteration}}" placeholder="Actividad">{{$item->dailyActivityText}}</textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <select class="custom-select" name="answer{{$loop->iteration}}" >
                                                        <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado"{{ $item->dailyActivityCheck == 'Totalmente logrado' ? 'selected' : '' }}>Totalmente logrado</option>
                                                          <option value="Medianamente logrado" {{ $item->dailyActivityCheck == 'Mediante logrado' ? 'selected' : '' }}>Mediante logrado</option>
                                                          <option value="Parcialmente logrado" {{ $item->dailyActivityCheck == 'Parcialmente logrado' ? 'selected' : '' }}>Parcialmente logrado</option>
                                                          <option value="No logrado" {{ $item->dailyActivityCheck == 'No logrado' ? 'selected' : '' }}>No logrado</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  @empty
                                                  <tr>
                                                    <th scope="row">1</th>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity1_id">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <textarea class="form-control" rows="1" name="activity1" placeholder="Actividad"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group" style="min-width: 10em">
                                                        <select class="custom-select" name="answer1" >
                                                        <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado">Totalmente logrado</option>
                                                          <option value="Medianamente logrado">Mediante logrado</option>
                                                          <option value="Parcialmente logrado">Parcialmente logrado</option>
                                                          <option value="No logrado">No logrado</option>
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
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity2_id">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" rows="1" name="activity2" placeholder="Actividad"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer2" >
                                                        <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado">Totalmente logrado</option>
                                                          <option value="Medianamente logrado">Mediante logrado</option>
                                                          <option value="Parcialmente logrado">Parcialmente logrado</option>
                                                          <option value="No logrado">No logrado</option>
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
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity3_id">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity3" rows="1" placeholder="Actividad"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer3" >
                                                        <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado">Totalmente logrado</option>
                                                          <option value="Medianamente logrado">Mediante logrado</option>
                                                          <option value="Parcialmente logrado">Parcialmente logrado</option>
                                                          <option value="No logrado">No logrado</option>
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
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity4_id">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity4" rows="1" placeholder="Actividad"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer4" >
                                                          <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado">Totalmente logrado</option>
                                                          <option value="Medianamente logrado">Mediante logrado</option>
                                                          <option value="Parcialmente logrado">Parcialmente logrado</option>
                                                          <option value="No logrado">No logrado</option>
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
                                                        <input type="text" class="form-control" placeholder="Actividad general" name="activity5_id">
                                                        </input>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <textarea class="form-control" name="activity5" rows="1" placeholder="Actividad"></textarea>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <select class="custom-select" name="answer5" >
                                                        <option selected value="">Escoge uno...</option>
                                                          <option value="Totalmente logrado">Totalmente logrado</option>
                                                          <option value="Medianamente logrado">Mediante logrado</option>
                                                          <option value="Parcialmente logrado">Parcialmente logrado</option>
                                                          <option value="No logrado">No logrado</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                          Please select a valid state.
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  @endforelse
                                                </tbody>
                                              </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                            <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                            <span id="btex">Editar</span></button>
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