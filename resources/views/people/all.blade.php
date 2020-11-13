@extends('layouts.app')

@section('content')

@if (count($peoples) !== 0)

@foreach ($peoples as $people)

@if($people->type == 'administration')
<a class="btn btn-dark" href="{{route('people.editAdmin', $people->id)}}">editar</a>
@endif

@if($people->type == 'teacher')
<a class="btn btn-dark" href="{{route('people.editTeacher', $people->id)}}">editar</a>
@endif

@if($people->type == 'student')
<a class="btn btn-dark" href="{{route('people.editStudent', $people->id)}}">editar</a>
@endif

<form action="{{route('people.updateAdmin', $people->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$people->fullname}}

{{$people->email}}

{{$people->type}}

{{$people->code}}

<img src="{{Gravatar::get($people->email)}}" alt="peopleGravatar">

@endforeach

@else

<div>
    No hay puto
</div>

@endif

@endsection