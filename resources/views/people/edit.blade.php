@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Edita tu información de ingreso
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
                                    value="{{$people->telephoneNumber}}"
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
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="email"
                                    id="email"
                                    placeholder="Ingresa tu email"
                                    class="form-control mb-2"
                                    value="{{$people->email}}"
                                    />
                                </div>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                <span id="btex">Envair</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection