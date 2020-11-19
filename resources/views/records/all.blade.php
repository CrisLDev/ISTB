@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-5">
            <div class="card">
                <div class="card-header bg-white text-center pt-4">
                    <h3 class="card-title">
                        Todas las fichas
                    </h3>
                </div>
                <div class="card-body">
                            @if (count($records) === 0)
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        no hayt prro
                                    </div>
                                </div>
                            </div>
                            @else
                            @foreach ($records as $record)
                            <div class="container border pt-2 pb-2 mb-3">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div>
                                            <h4>Alergias</h4>
                                            <p>{{$record->allergies}}</p>
                                        </div>
                                        <div>
                                            <h4>Lentes</h4>
                                            <p>{{$record->glasses}}</p>
                                        </div>
                                        <div>
                                            <h4>Nombre del estdiante</h4>
                                            <p>{{$record->sFullname}}</p>
                                        </div>
                                        <div>
                                            <h4>Curso</h4>
                                            <p>{{$record->courseName}}</p>
                                        </div>
                                        <div>
                                            <h4>Tratamiento</h4>
                                            <p>{{$record->treatment}}</p>
                                        </div>
                                        <div>
                                            <h4>Enfermedad cardiovascular</h4>
                                            <p>{{$record->cardiovascular}}</p>
                                        </div>
                                        <div>
                                            <h4>Piojos</h4>
                                            <p>{{$record->lice}}</p>
                                        </div>
                                        <div>
                                            <h4>Asma</h4>
                                            <p>{{$record->asthma}}</p>
                                        </div>
                                        <div>
                                            <h4>Malformaciones</h4>
                                            <p>{{$record->malformation}}</p>
                                        </div>
                                        <div>
                                            <h4>Lentes</h4>
                                            <p>{{$record->glasses}}</p>
                                        </div>
                                        <div>
                                            <h4>Observaciones</h4>
                                            <p>{{$record->observations}}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <a class="btn btn-dark" href="{{route('records.editRecords', $record->id)}}">editar</a>

                                        <form action="{{route('records.destroyRecords', $record->id)}}" method="POST" class="d-inline">
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
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection