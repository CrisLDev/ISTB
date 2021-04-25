<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Assistance::where('student_id', $id)->where('justification', '!=', null)->get();

        if(count($data) <= 0){
            return redirect(route('home'))->with('userErrors', 'El estudiante no tiene faltas registradas o se han eliminado todas las faltas.');
        }

        return view('students.assitance', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = Assistance::where('student_id', $id)->count();
        if($data > 30){
            return back()->with('userErrors', 'El estudiante ya ha alcanzado lo maximo en faltas.');
        }
        $data2 =  new Assistance();
        $rules = [
            'justification' => 'required|min:6',
            'day' => 'required',
        ];
        $niceNames = [
            'justification' => 'campo justificación',
            'day' => 'campo día'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data2->justification = $request->justification;
        $data2->student_id = $id;
        $data2->day = $request->day;
        $data2->save();
        return back()->with('message', 'Inacistencia agregada con éxito.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assistance  $assistance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Assistance::where('student_id', $id)->first();

        return view('students.editA', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assistance  $assistance
     * @return \Illuminate\Http\Response
     */
    public function edit(Assistance $assistance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assistance  $assistance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Assistance::where('student_id', $id)->count();
        if($data > 30){
            return back()->with('userErrors', 'El estudiante ya ha alcanzado lo maximo en faltas.');
        }
        $data2 =  Assistance::where('student_id', $id)->first();
        $rules = [
            'justification' => 'required|min:6',
            'day' => 'required',
        ];
        $niceNames = [
            'justification' => 'campo justificación',
            'day' => 'campo día'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data2->justification = $request->justification;
        $data2->student_id = $id;
        $data2->day = $request->day;
        $data2->save();
        return back()->with('message', 'Inacistencia agregada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assistance  $assistance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Assistance::findOrFail( $id );
        $data->justification = null;
        $data->save();
        return back()->with( 'message', 'Falta diaria Eliminada' );
    }
}
