@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                     <h3>Actividades y Cursos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.storeCourse') }}">
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
                                            value="{{old('courseName')}}"
                                            maxlength="40"
                                            minlength="6"
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
                                            value="{{old('ageRange')}}"
                                            maxlength="1"
                                            minlength="1"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Hora de incio:</label>
                                            <input
                                            type="time"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="startDate"
                                            id="startDate"
                                            placeholder="Ingresa el rango de edad"
                                            class="form-control mb-2"
                                            value="{{old('startDate')}}"
                                            maxlength="1"
                                            minlength="1"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Hora de fin:</label>
                                            <input
                                            type="time"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="endDate"
                                            id="endDate"
                                            placeholder="Ingresa el rango de edad"
                                            class="form-control mb-2"
                                            value="{{old('endDate')}}"
                                            maxlength="1"
                                            minlength="1"
                                            required
                                            />
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" id="button-prevent-multiple-submits2" type="submit">
                                                <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                                <span id="btex">Crear</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.storeActivity') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre de la actividad:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="activityName"
                                            id="activityName"
                                            placeholder="Ingresa nombre de la materia"
                                            class="form-control mb-2"
                                            value="{{old('activityName')}}"
                                            maxlength="20"
                                            minlength="6"
                                            required
                                            />
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
    </div>
</div>

@endsection