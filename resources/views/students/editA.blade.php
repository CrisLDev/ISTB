@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Editar Inacistencia
                    </h3>
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" action="{{ route('assitance.update', $data->student_id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="justification" placeholder="Escriba la justificación" value="{{$data->justification}}" minlength="6" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="day" value="{{$data->day}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block" d="button-prevent-multiple-submits"><span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                <span id="btex">ditar</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection