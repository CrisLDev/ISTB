@extends('layouts.app')

@section('content')

@if (count($peoples) !== 0)

@foreach ($peoples as $people)

{{$people->fullname}}

{{$people->email}}

{{$people->code}}

<img src="{{Gravatar::get($people->email)}}" alt="peopleGravatar">

@endforeach

@else

<div>
    No hay puto
</div>

@endif

@endsection