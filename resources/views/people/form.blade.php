@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        @if(Request::is('people/form/administration'))
                            Crear Personal
                        @endif
                        @if(Request::is('people/form/teacher'))
                            Crear Docente
                        @endif
                        @if(Request::is('people/form/student'))
                            Crear Estudiante
                        @endif
                    </h3>
                    @if ( session('userErrors') )
                        <div class="alert alert-danger">{{ session('userErrors')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    @if(Request::is('people/form/administration'))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.storeAdmin') }}">
                    @endif
                    @if(Request::is('people/form/teacher'))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.storeTeacher') }}">
                    @endif
                    @if(Request::is('people/form/student'))
                        <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{ route('people.storeStudent') }}">
                    @endif
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
                                    placeholder="Ingresa el nombre completo"
                                    class="form-control mb-2"
                                    value="{{old('fullname')}}"
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
                                    placeholder="Ingresa el nombre completo"
                                    class="form-control mb-2"
                                    value="{{old('telephoneNumber')}}"
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
                                    placeholder="Ingresa el nombre completo"
                                    class="form-control mb-2"
                                    value="{{old('dni')}}"
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
                                    placeholder="Ingresa el nombre completo"
                                    class="form-control mb-2"
                                    value="{{old('address')}}"
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
                                    placeholder="Ingresa el nombre completo"
                                    class="form-control mb-2"
                                    value="{{old('age')}}"
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
                                    placeholder="Ingresa el email"
                                    class="form-control mb-2"
                                    value="{{old('email')}}"
                                    />
                                </div>
                            </div>
                            @if(Request::is('people/form/administration'))
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
                                    value="{{old('role')}}"
                                    />
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" id="button-prevent-multiple-submits" type="submit">
                                <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                <span id="btex">Crear</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection