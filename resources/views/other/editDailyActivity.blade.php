@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                     <h3>Actividades</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('dactivities.updateDaily', $dailyactivity->id) }}">
                            @method('PUT')
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre de la actividad diaria:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="activity_id"
                                            id="activity_id"
                                            placeholder="Ingresa nombre de la actividad diaria"
                                            class="form-control mb-2"
                                            value="{{$dailyactivity->activity_id}}"
                                            maxlength="20"
                                            minlength="6"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre de la actividad:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="dailyActivityText"
                                            id="dailyActivityText"
                                            placeholder="Ingresa nombre de la actividad"
                                            class="form-control mb-2"
                                            value="{{$dailyactivity->dailyActivityText}}"
                                            maxlength="20"
                                            minlength="6"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Actividad cumplida:</label>
                                            <select class="custom-select" name="dailyActivityCheck" required>
                                                <option value="Totalmente logrado" {{ $dailyactivity->dailyActivityCheck == 'Totalmente logrado' ? 'selected' : '' }}>Totalmente logrado</option>
                                                <option value="Mediante logrado" {{ $dailyactivity->dailyActivityCheck == 'Mediante logrado' ? 'selected' : '' }}>Mediante logrado</option>
                                                <option value="Parcialmente logrado" {{ $dailyactivity->dailyActivityCheck == 'Parcialmente logrado' ? 'selected' : '' }}>Parcialmente logrado</option>
                                                <option value="No logrado" {{ $dailyactivity->dailyActivityCheck == 'No logrado' ? 'selected' : '' }}>No logrado</option>
                                            </select>
                                            <div class="invalid-feedback">
                                              Please select a valid state.
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                                <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                                <span id="btex">Enviar</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection