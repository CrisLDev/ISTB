@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title mb-0">
                        Edita tu información de ingreso
                    </h3>
                    @if ( session('userErrors') )
                        <div class="alert alert-danger">{{ session('userErrors')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" action="{{route('user.update', $user->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre de usuario:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="username"
                                    id="username"
                                    placeholder="Ingresa tu nombre de usuario"
                                    class="form-control mb-2"
                                    value="{{$user->username}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputState">Rol</label>
                                    <select id="inputState" class="form-control" name="role">
                                      <option selected>Elige uno...</option>
                                      <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                      <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Usuario:</label>
                                    <input
                                    type="text"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="name"
                                    id="name"
                                    placeholder="Ingresa tu nombre completo"
                                    class="form-control mb-2"
                                    value="{{$user->name}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                    value="{{$user->email}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input
                                    type="password"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="password"
                                    id="password"
                                    placeholder="Ingresa tus contraseña"
                                    class="form-control mb-2"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirmar contraseña:</label>
                                    <input
                                    type="password"
                                    autocomplete="none"
                                    spellcheck="false"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Ingresa tus contraseña"
                                    class="form-control mb-2"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-warning btn-block" id="button-prevent-multiple-submits" type="submit">
                                <span class="spinner-border spinner-border-sm" id="spinner" role="status" aria-hidden="true"></span>    
                                <span id="btex">Editar</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection