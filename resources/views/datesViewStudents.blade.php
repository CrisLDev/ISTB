@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($activitiesArray) !== 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                          <tr>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Nombre</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($activitiesArray as $activity)
                                <tr>
                                    <td>{{$activity->activity_id}}</td>
                                    <td>
                                        <a href="{{route('module.indexStudent', ['student_id'=>$student_id, 'date'=>$activity->created_at->format('Y-m-d')])}}">
                                            {{$activity->created_at->format('d-m-Y')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                nO HAY NADA PRRO
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scriptsByPage')
@endsection