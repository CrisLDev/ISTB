@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($students) !== 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                          <tr>
                            <th class="text-nowrap pt-3 pb-3" scope="col">#</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Nombre</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Asistencia</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Gen - 1</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Dia - 1</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Nota - 1</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Gen - 2</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Dia - 2</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Nota - 2</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Gen - 3</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Dia - 3</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Nota - 3</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Gen - 4</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Dia - 4</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Nota - 4</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Gen - 5</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Dia - 5</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Act - Nota - 5</th>
                            <th class="text-nowrap pt-3 pb-3" scope="col">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->fullname}}</td>
                                    @foreach ($reFinalAssistancesSearch as $assistances)
                                        @if ($student->id == $assistances->student_id)
                                            @if ($assistances->justification === null)
                                                <td class="text-center"><span class="h2">&#10003;</span></td>
                                            @else
                                                <td class="text-center"><span class="h2">&times;</span></td>
                                            @endif
                                        @endif
                                    @endforeach
                                    @foreach ($reFinalActivitiesSearch as $activity)
                                        @if ($student->id == $activity->student_id)
                                            @if ($activity->activity_id != null)
                                                <td>{{$activity->activity_id}}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif
                                            @if ($activity->dailyActivityText != null)
                                                <td>{{$activity->dailyActivityText}}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif
                                            @if ($activity->dailyActivityCheck != null)
                                                <td>{{$activity->dailyActivityCheck}}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td><a target="_blank" href="{{route('students.studentEditGrade', [$student->id, $date])}}" class="btn btn-warning">Editar</a></td>
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