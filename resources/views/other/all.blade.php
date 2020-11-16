@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center m-3">
                     <h3>Materias y Cursos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('other.storeSubject') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre de la materia:</label>
                                            <input
                                            type="text"
                                            autocomplete="none"
                                            spellcheck="false"
                                            name="subjectName"
                                            id="subjectName"
                                            placeholder="Ingresa nombre de la materia"
                                            class="form-control mb-2"
                                            />
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
                                            />
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
    </div>
</div>

@endsection