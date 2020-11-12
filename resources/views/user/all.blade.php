@extends('layouts.app')

@section('content')

@foreach ($users as $user)

<a class="btn btn-dark" href="{{route('user.edit', $user->id)}}">editar</a>

<form action="{{route('user.delete', $user->id)}}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">
        Eliminar
    </button>
</form>

{{$user->username}}

{{$user->email}}

{{$user->role}}

<img src="{{Gravatar::get($user->email)}}" alt="userGravatar">

@endforeach

@endsection