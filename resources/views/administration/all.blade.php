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
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            @if (count($administrations) !== 0)

                                @foreach ($administrations as $administration)

                                <div class="col-md-2 d-flex align-items-center">
                                    <img src="{{Gravatar::get($administration->email)}}" alt="peopleGravatar">
                                </div>

                                <div class="col-md-8 d-flex align-items-center justify-content-between">
                                    <span>{{$administration->fullname}}</span>

                                    <span>{{$administration->email}}</span>

                                    <span>{{$administration->type}}</span>

                                    <span>{{$administration->code}}</span>

                                </div>

                                <div class="col-md-2 d-flex align-items-center">
                                    <a class="btn btn-dark mr-2" href="{{route('people.editAdmin', $administration->id)}}">editar</a>
                                <form action="{{route('people.deleteAdmin', $administration->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                                </div>

                                @endforeach

                            @else

                                <div class="col-md-12">
                                    <p>No hay registros de Personal</p>
                                </div>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection