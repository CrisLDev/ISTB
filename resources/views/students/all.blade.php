@extends('layouts.app')

@section('content')

@foreach ($students as $student)

<a class="btn btn-info" href="{{route('students.showStudent', $student->id)}}">Ver</a>

<a class="btn btn-dark" href="{{route('people.editStudent', $student->id)}}">editar</a>

<form action="{{route('people.deleteStudent', $student->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$student->username}}

{{$student->email}}

{{$student->role}}

<img src="{{Gravatar::get($student->email)}}" alt="userGravatar">

@endforeach

@endsection