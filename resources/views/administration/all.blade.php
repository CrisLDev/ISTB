@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todos los registros de personal
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" name="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @if (count($administrations) !== 0)

                                @foreach ($administrations as $administration)

                                <div class="container">
                                    <div class="row justify-content-center">

                                <div class="col-md-2 col-sm-2 d-flex justify-content-center align-items-center">
                                    <img class="mb-2" src="{{Gravatar::get($administration->email)}}" alt="peopleGravatar">
                                </div>

                                <div class="col-md-8 col-sm-12">
                                    <p class="font-weight-bold">Nombre:</p>
                                    <p>{{$administration->fullname}}</p>

                                    <p class="font-weight-bold">Email:</p>
                                    <p>{{$administration->email}}</p>

                                    <p class="font-weight-bold">Codigo:</p>
                                    <p>{{$administration->code}}</p>

                                    <p class="font-weight-bold">Cargo:</p>
                                    <p>{{$administration->role}}</p>

                                </div>

                                <div class="col-md-2 col-sm-2 d-flex align-items-center">
                                    <a class="btn btn-dark mr-2" href="{{route('people.editAdmin', $administration->id)}}">editar</a>
                                <form action="{{route('people.deleteAdmin', $administration->id)}}" method="POST" class="d-inline">
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

                            @else

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>No hay registros de Personal</p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif

                            <div class="container d-flex justify-content-center">
                                {{$administrations->links()}}
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection