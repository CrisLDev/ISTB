<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Reports;
use App\Models\Grades;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administration;
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
    public function formReports()
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
        $teachers = Teacher::get();
        $students = Student::get();
        $courses = Course::get();
        $subjects = Subject::get();
        return view('other.grades', compact('teachers', 'students', 'courses', 'subjects'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudents()
    {
        $students = Student::get();
        return view('students.all', compact('students'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdministration()
    {
        $administrations = Administration::get();
        return view('administration.all', compact('administrations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTeachers()
    {
        $teachers = Teacher::get();
        return view('teachers.all', compact('teachers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports()
    {
        $reports = Reports::get();
        return view('reports.all', compact('reports'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReport(Request $request)
    {
        $data = new Reports();
        $data->resume = $request->resume;
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->subject_id = $request->subject_id;
        $data->content = $request->content;
        $data->save();
        return back()->with('message', 'Reporte agregado con éxito.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGrade(Request $request)
    {
        $data = new Grades();
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->subject_id = $request->subject_id;
        $data->grade = $request->grade;
        $data->assistance = $request->assistance;
        $data->save();
        return back()->with('message', 'Nota agregado con éxito.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editReport($id)
    {
        $teachers = Teacher::get();
        $students = Student::get();
        $courses = Course::get();
        $subjects = Subject::get();
        $report = Reports::where('id', $id)->first();
        return view('reports.edit', compact('teachers', 'students', 'courses', 'subjects', 'report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function updateReport(Request $request, $id)
    {
        $data = Reports::where('id', $id)->first();

        $data->resume = $request->resume;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->subject_id = $request->subject_id;
        $data->content = $request->content;
        $data->save();
        return back()->with('message', 'Reporte editado con éxito.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroyReport(Subject $subject)
    {
        $data = Reports::findOrFail( $id )->delete();
        return back()->with( 'message', 'Reporte Eliminado' );
    }
}
