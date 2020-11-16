@extends('layouts.app')

@section('content')

@foreach ($administrations as $administration)

<a class="btn btn-dark" href="{{route('people.editAdmin', $administration->id)}}">editar</a>
<form action="{{route('people.deleteAdmin', $administration->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$administration->username}}

{{$administration->email}}

{{$administration->role}}

<img src="{{Gravatar::get($administration->email)}}" alt="userGravatar">

@endforeach

@endsection