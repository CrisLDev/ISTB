@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-5">
            <div class="card mb-5">
                <div class="card-header bg-white text-center pt-4 mb-3">
                    <h3 class="card-title">
                        Todas las fichas
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Alergias" name="allergies" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Tratamiento" name="treatment" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Enfermedad cardiovascular" name="cardiovascular" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Piojos" name="lice" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Asma" name="asthma" class="form-control">
                        </div>
                        <!--<div class="form-group">
                            <input type="text" placeholder="Malformaciones" name="malformation" class="form-control">
                        </div>-->
                        <div class="form-group">
                            <input type="text" placeholder="Lentes" name="glasses" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @if (count($records) === 0)
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        No hay fichas.
                                    </div>
                                </div>
                            </div>
                            @else
                            @foreach ($records as $record)
                            <div class="container border pt-2 pb-2 mb-5">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                                        <div>
                                            <h4>Alergias</h4>
                                            @if ($record->allergies != null)
                                                <p>{{$record->allergies}}</p>
                                            @else
                                                <p>N/A</p>
                                            @endif
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
                                            @if ($record->treatment != null)
                                                <p>{{$record->treatment}}</p>
                                            @else
                                                <p>N/A</p>
                                            @endif
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
                                        <!--<div>
                                            <h4>Malformaciones</h4>
                                            @if ($record->malformation != null)
                                                <p>{{$record->malformation}}</p>
                                            @else
                                            <p>N/A</p>
                                            @endif
                                        </div>-->
                                        <div>
                                            <h4>Lentes</h4>
                                            <p>{{$record->glasses}}</p>
                                        </div>
                                        <div>
                                            <h4>Observaciones</h4>
                                            @if ($record->observations != null)
                                                <p>{{$record->observations}}</p>
                                            @else
                                                <p>N/A</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
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

                            <hr class="mb-5">

                            @endforeach
                            <div class="col-md-12 mb-2 d-flex justify-content-center">
                                <p>{{$records->links()}}</p>
                            </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection