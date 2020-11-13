@extends('layouts.app')

@section('content')

@if (count($peoples) !== 0)

@foreach ($peoples as $people)

@if($people->type == 'administration')
<a class="btn btn-dark" href="{{route('people.editAdmin', $people->id)}}">editar</a>
<form action="{{route('people.deleteAdmin', $people->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>
@endif

@if($people->type == 'teacher')
<a class="btn btn-dark" href="{{route('people.editTeacher', $people->id)}}">editar</a>
<form action="{{route('people.deleteTeacher', $people->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>
@endif

@if($people->type == 'student')
<a class="btn btn-dark" href="{{route('people.editStudent', $people->id)}}">editar</a>
<form action="{{route('people.deleteStudent', $people->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>
@endif

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