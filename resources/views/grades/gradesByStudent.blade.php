@extends('layouts.app')

@section('content')

@if (count($activitiesTotal) !== 0)
    <div class="card bg-primary mb-3 shadow-lg text-white">
        <div class="card-body d-flex justify-content-between">
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Suma total de las notas:</h5>
                <span class="ml-2">{{$allSumNote ? $allSumNote : 'N/A'}}</span>
            </div>
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Número de tareas:</h5>
                <span class="ml-2">{{count($activitiesTotal) ? count($activitiesTotal) : 'N/A'}}</span>
            </div>
        </div>
    </div>
    @foreach ($activitiesTotal as $item)
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Nombre de la tarea:</h5>
                <span class="ml-2">{{$item->activity_id ? $item->activity_id : 'N/A'}}</span>
            </div>
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Nombre de la subtarea: </h5>
                <span class="ml-2">{{$item->dailyActivityText ? $item->dailyActivityText : 'N/A'}}</span>
            </div>
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Nota: </h5>
                <span class="ml-2">{{$item->dailyActivityCheck ? $item->dailyActivityCheck : 'N/A'}}</span>
            </div>
            <div class="d-flex align-items-baseline">
                <h5 class="font-weight-bold">Observación: </h5>
                <span class="ml-2">{{$item->dailyActivityJustification ? $item->dailyActivityJustification : 'N/A'}}</span>
            </div>
        </div>
    </div>
    @endforeach
    @if ($finalNote < 6)
        <div class="card bg-danger mb-3 shadow-lg text-white">
    @endif
    @if ($finalNote > 6 && $finalNote < 7)
        <div class="card bg-warning mb-3 shadow-lg text-dark">
    @endif
    @if ($finalNote > 7 && $finalNote < 8)
        <div class="card bg-info mb-3 shadow-lg text-dark">
    @endif
    @if ($finalNote > 8 && $finalNote <= 10)
        <div class="card bg-primary mb-3 shadow-lg text-white">
    @endif
        <div class="card-body d-flex">
            <h5 class="font-weight-bold">Promedio final:</h5>
            <span class="ml-2">{{$finalNote ? $finalNote : 'N/A'}}</span>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <p>{{$activitiesTotal->links()}}</p>
    </div>
@else
    <div class="card">
        <div class="card-body text-center">
            No hay actividades registradas.
        </div>
    </div>
@endif

@endsection