@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center mb-3 pt-4">
                    <h3 class="card-title">
                        Todas las faltas
                    </h3>
                </div>
                <div class="card-body">
                    @foreach ($data as $item)
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card card-body">
                                    <p>{{$item->justification}}</p>
                                    <p class="font-weight-bold">{{$item->day}}</p>
                                    @if (Auth::user()->role === "admin" || Auth::user()->role === "coor")
                                    <div>
                                        <a href="{{route('assitance.show', $item->student_id)}}" class="btn btn-dark">Editar</a>
                                        <form action="{{route('assitance.delete', $item->id)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection