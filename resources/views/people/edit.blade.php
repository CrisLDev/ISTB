@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header mb-3 bg-white text-center pt-4">
                    <h3 class="card-title">
                        Editar @if(Request::is('people/form/administration/edit/'.$people->id))
                        Personal
                    @endif
                    @if(Request::is('people/form/teacher/edit/'.$people->id))
                        Docente
                    @endif
                    @if(Request::is('people/form/student/edit/'.$people->id))
                        Estudiante
                    @endif
                    </h3>
                </div>
                <div class="card-body">
                    @if(Request::is('people/form/administration/edit/'.$people->id))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.updateAdmin', $people->id) }}">
                    @endif
                    @if(Request::is('people/form/teacher/edit/'.$people->id))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.updateTeacher', $people->id) }}">
                    @endif
                    @if(Request::is('people/form/student/edit/'.$people->id))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.updateStudent', $people->id) }}">
                    @endif
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre completo:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="fullname"
                                    id="fullname"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="{{$people->fullname}}"
                                    maxlength="60"
                                    minlength="20"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número de telefono:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="telephoneNumber"
                                    id="telephoneNumber"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="0{{$people->telephoneNumber}}"
                                    maxlength="11"
                                    minlength="10"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número de cédula:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="dni"
                                    id="dni"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="{{$people->dni}}"
                                    maxlength="15"
                                    minlength="10"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="address"
                                    id="address"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="{{$people->address}}"
                                    maxlength="40"
                                    minlength="20"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Edad:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="age"
                                    id="age"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="{{$people->age}}"
                                    maxlength="3"
                                    minlength="1"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input
                                    type="email"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="email"
                                    id="email"
                                    placeholder="Ingresa tu email"
                                    class="form-control mb-2"
                                    value="{{$people->email}}"
                                    maxlength="50"
                                    minlength="10"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                    <input
                                    type="date"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="birthDate"
                                    id="birthDate"
                                    placeholder="Ingresa tu fecha de nacimiento"
                                    class="form-control mb-2"
                                    value="{{$people->birthDate}}"
                                    required
                                    />
                                </div>
                            </div>
                            @if(Request::is('people/form/administration/edit/'.$people->id))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cargo:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="role"
                                    id="role"
                                    placeholder="Ingresa el cargo"
                                    class="form-control mb-2"
                                    value="{{$people->role}}"
                                    maxlength="20"
                                    minlength="5"
                                    required
                                    />
                                </div>
                            </div>
                            @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                    <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                    <span id="btex">Enviar</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection