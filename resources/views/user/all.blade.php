@extends('layouts.app')

@section('content')

@foreach ($users as $user)

{{$user->username}}

@endforeach

@endsection