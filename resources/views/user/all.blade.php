@extends('layouts.app')

@section('content')

@foreach ($users as $user)

{{$user->username}}

{{$user->email}}

{{$user->role}}

<img src="{{Gravatar::get($user->email)}}" alt="userGravatar">

@endforeach

@endsection