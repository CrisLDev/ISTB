@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-5">
            <div class="card mb-5">
                <div class="card-header bg-white text-center pt-4 mb-3">
                    <h3 class="card-title">
                        Todos los reportes
                    </h3>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Resumen" name="resume" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Cotenido" name="content" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                            @if (count($reports) === 0)
                                <div class="col-md-12">
                                    No existen reportes
                                </div>
                            @else
                            @foreach ($reports as $report)

                                <div class="container border pt-3 pb-3 mb-5">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <div>
                                                <h4>Resumen</h4>
                                                <p>{{$report->resume}}</p>
                                            </div>
                                            <div>
                                                <h4>Docente</h4>
                                                <p>{{$report->tFullname}}</p>
                                            </div>
                                            <div>
                                                <h4>Estudiante</h4>
                                                <p>{{$report->sFullname}}</p>
                                            </div>
                                            <div class="mb-3">
                                                <h4>Cotenido</h4>
                                                <span>{{$report->content}}</span>
                                            </div>
                                            <div class="mb-3">
                                                <h4>Curso</h4>
                                                <span>{{$report->courseName}}</span>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4 col-md-12">
                                            <a class="btn btn-dark" href="{{route('reports.editReport', $report->id)}}">editar</a>
        
                                            <form action="{{route('reports.destroyReport', $report->id)}}" method="POST" class="d-inline">
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
                                <p>{{$reports->links()}}</p>
                            </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection