@extends('layouts.app')

@section('content')

@if (count($administrations) !== 0)

@foreach ($administrations as $administration)
<a class="btn btn-dark" href="{{route('people.editAdmin', $administration->id)}}">editar</a>
<form action="{{route('people.deleteAdmin', $administration->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$administration->fullname}}

{{$administration->email}}

{{$administration->type}}

{{$administration->code}}

<img src="{{Gravatar::get($administration->email)}}" alt="peopleGravatar">

@endforeach

@else

<div>
    No hay puto
</div>

@endif

@if (count($teachers) !== 0)

@foreach ($teachers as $teacher)
<a class="btn btn-dark" href="{{route('people.editTeacher', $teacher->id)}}">editar</a>
<form action="{{route('people.deleteTeacher', $teacher->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$teacher->fullname}}

{{$teacher->email}}

{{$teacher->type}}

{{$teacher->code}}

<img src="{{Gravatar::get($teacher->email)}}" alt="peopleGravatar">

@endforeach

@else

<div>
    No hay puto
</div>

@endif

@if (count($students) !== 0)

@foreach ($students as $student)
<a class="btn btn-dark" href="{{route('people.editStudent', $student->id)}}">editar</a>
<form action="{{route('people.deleteStudent', $student->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$student->fullname}}

{{$student->email}}

{{$student->type}}

{{$student->code}}

<img src="{{Gravatar::get($student->email)}}" alt="peopleGravatar">

@endforeach

@else

<div>
    No hay puto
</div>

@endif

@endsection