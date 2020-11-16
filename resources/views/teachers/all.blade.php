@extends('layouts.app')

@section('content')

@foreach ($teachers as $teacher)

<a class="btn btn-dark" href="{{route('people.editTeacher', $teacher->id)}}">editar</a>
<form action="{{route('people.deleteTeacher', $teacher->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$teacher->username}}

{{$teacher->email}}

{{$teacher->role}}

<img src="{{Gravatar::get($teacher->email)}}" alt="userGravatar">

@endforeach

@endsection