@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card mb-5">
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

                                <div class="container mb-5 border-bottom">
                                    <div class="row justify-content-center">

                                <div class="col-lg-2 col-md-2 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                                    @if ($administration->imgUrl)
                                    <img class="img-fluid mb-3" src="/storage/peopleImage/{{$administration->imgUrl}}" alt="peopleGravatar">
                                @else
                                    <img class="img-fluid mb-3" src="/assets/nouse.png" alt="peopleGravatar">
                                @endif
                                </div>

                                <div class="col-lg-7 col-md-10 col-sm-12 col-12">
                                    <p class="font-weight-bold">Nombre:</p>
                                    <p>{{$administration->fullname}}</p>

                                    <p class="font-weight-bold">Email:</p>
                                    <p>{{$administration->email}}</p>

                                    <p class="font-weight-bold">Codigo:</p>
                                    <p>{{$administration->code}}</p>

                                    <p class="font-weight-bold">Cargo:</p>
                                    <p>{{$administration->role}}</p>

                                    <p class="font-weight-bold">Fecha de nacimiento:</p>
                                    <p>{{$administration->birthDate}}</p>

                                    @if ($administration->curriculum)
                                        <p><a class="font-weight-bold" href="/storage/peopleDocs/{{$administration->curriculum}}">Curriculum</a></p>
                                    @else
                                        <p><a class="font-weight-bold" href="http://190.186.233.212/filebiblioteca/Ciencia%20Ficcion%20-%20Fantasia%20-%20Terror%20-%20Policiales/J.K.%20Rowling%20-%2001%20-%20Harry%20Potter%20y%20la%20Piedra%20Filosofal.pdf">Curriculum</a></p>
                                    @endif

                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-flex align-items-center mb-5">
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