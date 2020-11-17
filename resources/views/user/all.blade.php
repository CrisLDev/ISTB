@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todos los usuarios
                    </h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($users as $user)

                                <div class="col-md-2 d-flex align-items-center">
                                    <img src="{{Gravatar::get($user->email)}}" alt="userGravatar">
                                </div>

                                <div class="col-md-8 d-flex align-items-center justify-content-between">
                                    <span>{{$user->username}}</span>

                                    <span>{{$user->email}}</span>

                                    <span>{{$user->role}}</span>
                                </div>

                                <div class="col-md-2 d-flex align-items-center">
                                    <a class="btn btn-dark mr-2" href="{{route('user.edit', $user->id)}}">editar</a>

                                    <form action="{{route('user.delete', $user->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection