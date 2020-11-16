<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Reports;
use App\Models\Grades;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('other.all');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports()
    {
        $teachers = Teacher::get();
        $students = Student::get();
        $courses = Course::get();
        $subjects = Subject::get();
        return view('other.reports', compact('teachers', 'students', 'courses', 'subjects'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGrades()
    {
        return view('other.grades');
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
    public function storeSubject(Request $request)
    {
        $data = new Subject();
        $data->name = $request->name;
        $data->save();
        return back()->with('message', 'Materia agregada con éxito.');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCourse(Request $request)
    {
        $data = new Course();
        $data->name = $request->name;
        $data->save();
        return back()->with('message', 'Curso agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
