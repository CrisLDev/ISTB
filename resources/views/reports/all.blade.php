@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8 mb-3">
            <div class="card">
                <div class="card-header bg-white text-center pt-4">
                    <h3 class="card-title">
                        Todas las notas
                    </h3>
                    @if ( session('userErrors') )
                        <div class="alert alert-danger">{{ session('userErrors')}}</div>
                    @endif
                </div>
                <div class="card-body">
                            @if (count($reports) === 0)
                                <div class="col-md-12">
                                    no hayt prro
                                </div>
                            @else
                            @foreach ($reports as $report)

                                <div class="container border pt-3 pb-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
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
                                                <p>{{$report->resume}}</p>
                                                <span>{{$report->content}}</span>
                                            </div>
                                            <div>
                                                <h4>Curso y materia</h4>
                                                <span>{{$report->courseName}}</span>
                                                <span>{{$report->subjectName}}</span>
                                            </div>
                                        </div>
        
                                        <div class="col-md-3">
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

                            @endforeach
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection