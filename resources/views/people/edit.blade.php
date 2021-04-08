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
                                    @if(Request::is('people/form/student/edit/'.$people->id))
                                    <label>Apellidos y nombres del niño/a:</label>
                                    @endif
                                    @if(!Request::is('people/form/student/edit/'.$people->id))
                                    <label>Nombre completo:</label>
                                    @endif
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
                                    maxlength="70"
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
                            <div class="col-md-6">
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
                            @if(Request::is('people/form/student/edit/'.$people->id))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Apellidos y nombres del padre:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="fatherName"
                                    id="fatherName"
                                    placeholder="Ingresa el nombre del padre"
                                    class="form-control mb-2"
                                    value="{{$people->fatherName}}"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número de cédula del padre:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="dniFather"
                                    id="dniFather"
                                    placeholder="Ingresa cedula del padre"
                                    class="form-control mb-2"
                                    value="{{$people->dniFather}}"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Apellidos y nombres de la madre:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="motherName"
                                    id="motherName"
                                    placeholder="Ingresa el nombre de la madre"
                                    class="form-control mb-2"
                                    value="{{$people->motherName}}"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numero de cedula de la madre:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="dniMother"
                                    id="dniMother"
                                    placeholder="Ingresa cedula de la madre"
                                    class="form-control mb-2"
                                    value="{{$people->dniMother}}"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group w-100">
                                <label>Carnet de vacunación:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileCard" name="vaccinationCard">
                                    <label class="custom-file-label act" for="customFileCard">Escoger archivo...</label>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group w-100">
                                <label>Acta de compromiso:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileAct" name="fileAct">
                                    <label class="custom-file-label act" for="customFileAct">Escoger archivo...</label>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="Activo" {{ $people->status == 'Activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Enfermo" {{ $people->status == 'Enfermo' ? 'selected' : '' }}>Enfermo</option>
                                        <option value="Expulsado" {{ $people->status == 'Expulsado' ? 'selected' : '' }}>Expulsado</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(Request::is('people/form/teacher/edit/'.$people->id))
                            <div class="col-md-12">
                                <div class="form-group w-100">
                                <label>Curriculum:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileAct" name="fileAct">
                                    <label class="custom-file-label act" for="customFileAct">Escoger archivo...</label>
                                </div>
                                </div>
                            </div>
                            @endif
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
                            <div class="col-md-12">
                                <div class="form-group w-100">
                                <label>Curriculum:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileAct" name="fileAct">
                                    <label class="custom-file-label act" for="customFileAct">Escoger archivo...</label>
                                </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group w-100">
                                <label>Foto tamaño carnet:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Escoger archivo...</label>
                                </div>
                                </div>
                            </div>
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