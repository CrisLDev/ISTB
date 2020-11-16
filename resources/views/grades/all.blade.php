@extends('layouts.app')

@section('content')

@if (count($grades) === 0)
    <div>
        no hayt prro
    </div>
@else
@foreach ($grades as $grade)

{{$grade}}

<a class="btn btn-dark" href="{{route('grades.editGrade', $grade->id)}}">editar</a>

<form action="{{route('grades.destroyGrade', $grade->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$grade->grade}}

@endforeach
@endif

@endsection