@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center pt-4 mb-3">
                     <h3>Cursos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.updateCourse', $course->id) }}">
                            @method('PUT')
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre del curso:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="courseName"
                                            id="courseName"
                                            placeholder="Ingresa nombre del curso"
                                            class="form-control mb-2"
                                            value="{{$course->courseName}}"
                                            maxlength="5"
                                            minlength="2"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Rango de edad:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="ageRange"
                                            id="ageRange"
                                            placeholder="Ingresa el rango de edad"
                                            class="form-control mb-2"
                                            value="{{$course->ageRange}}"
                                            maxlength="1"
                                            minlength="1"
                                            required
                                        />
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