@extends('layouts.app')

@section('content')

@if (count($reports) === 0)
    <div>
        no hayt prro
    </div>
@else
@foreach ($reports as $report)

<a class="btn btn-dark" href="{{route('reports.editReport', $report->id)}}">editar</a>

<form action="{{route('reports.destroyReport', $report->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$report->resume}}

@endforeach
@endif

@endsection