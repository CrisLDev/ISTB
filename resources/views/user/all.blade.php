@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card mb-5">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todos los usuarios
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @foreach ($users as $user)
                            <div class="container mb-4 border-bottom">
                                <div class="row justify-content-center">

                                <div class="col-lg-2 col-md-2 col-sm-12 d-flex align-items-center justify-content-center">
                                    <img class="mb-2" src="{{Gravatar::get($user->email)}}" alt="userGravatar">
                                </div>

                                <div class="col-lg-7 col-md-10 col-sm-12 col-sm-12">
                                    <p class="font-weight-bold">Nombre de usuario:</p>
                                    <p>{{$user->username}}</p>

                                    <p class="font-weight-bold">Email:</p>
                                    <p>{{$user->email}}</p>

                                    <p class="font-weight-bold">Rol:</p>
                                    <p>{{$user->role}}</p>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-sm-12d-flex align-items-center mb-5">
                                    <a class="btn btn-dark mr-2" href="{{route('user.edit', $user->id)}}">editar</a>

                                    <form action="{{route('user.delete', $user->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                            @endforeach
                        <div class="container mb-2 d-flex justify-content-center">
                            <p>{{$users->links()}}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection