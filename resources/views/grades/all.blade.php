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
                    <div class="container">
                        <div class="row">
                            @if (count($grades) === 0)
                                <div class="col-md-12">
                                    no hayt prro
                                </div>
                            @else
                            @foreach ($grades as $grade)

                                <div class="col-md-9">
                                    <span>{{$grade->tFullname}}</span>
                                    <span>{{$grade->sFullname}}</span>
                                    <span>{{$grade->grade}}</span>
                                    <span>{{$grade->assistance}}</span>
                                    <span>{{$grade->courseName}}</span>
                                    <span>{{$grade->subjectName}}</span>
                                </div>

                                <div class="col-md-3">
                                    <a class="btn btn-dark" href="{{route('grades.editGrade', $grade->id)}}">editar</a>

                                    <form action="{{route('grades.destroyGrade', $grade->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>

                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection