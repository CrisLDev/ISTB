<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Reports;
use App\Models\Record;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administration;
use Illuminate\Http\Request;

class OtherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::get();
        $courses = Course::get();
        return view('other.index', compact('subjects', 'courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('other.form');
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
    public function formRecord()
    {
        $students = Student::get();
        $courses = Course::get();
        return view('other.records', compact('students', 'courses'));
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
        $reports = Reports::join('users', 'reports.user_id', '=', 'users.id')
                            ->join('subjects', 'reports.subject_id', '=', 'subjects.id')
                            ->join('courses', 'reports.course_id', '=', 'courses.id')
                            ->join('teachers', 'reports.teacher_id', '=', 'teachers.id')
                            ->join('students', 'reports.student_id', '=', 'students.id')
                            ->select('reports.*', 'reports.resume', 'reports.content', 'teachers.fullname as tFullname', 'students.fullname as sFullname', 'courses.courseName', 'subjects.subjectName')
                            ->get();
        return view('reports.all', compact('reports'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRecord()
    {
        $records = Record::join('users', 'records.user_id', '=', 'users.id')
                        ->join('courses', 'records.course_id', '=', 'courses.id')
                        ->join('students', 'records.student_id', '=', 'students.id')
                        ->select('records.*', 'records.allergies', 'records.glasses', 'students.fullname as sFullname', 'courses.courseName', 'records.treatment', 'records.cardiovascular', 'records.lice', 'records.asthma', 'records.malformation', 'records.glasses', 'records.observations')
                        ->get();
        return view('records.all', compact('records'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/profile');
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
        $rules = [
            'subjectName' => 'required|unique:subjects|max:20',
        ];
        $niceNames = [
            'subjectName' => 'nombre de la materia'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->subjectName = $request->subjectName;
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
        $rules = [
            'courseName' => 'required|unique:courses|max:20',
        ];
        $niceNames = [
            'courseName' => 'nombre del curso'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->courseName = $request->courseName;
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
    public function storeRecord(Request $request)
    {
        $data = new Record();
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->allergies = $request->allergies;
        $data->treatment = $request->treatment;
        $data->cardiovascular = $request->cardiovascular;
        $data->lice = $request->lice;
        $data->asthma = $request->asthma;
        $data->malformation = $request->malformation;
        $data->glasses = $request->glasses;
        $data->observations = $request->observations;
        $data->save();
        return back()->with('message', 'Ficha médica agregada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showStudent($id)
    {
        $student = Student::where('id', $id)->first();

        $grade = Grades::where('student_id', '=', $id)
                        ->join('users', 'grades.user_id', '=', 'users.id')
                        ->join('subjects', 'grades.subject_id', '=', 'subjects.id')
                        ->join('courses', 'grades.course_id', '=', 'courses.id')
                        ->join('teachers', 'grades.teacher_id', '=', 'teachers.id')
                        ->select('grades.*', 'users.name as userName', 'users.email as userEmail', 'subjects.subjectName as subjectName', 'grades.grade', 'grades.assistance', 'teachers.fullname as teacherFullname', 'courses.courseName', 'grades.course_id')
                        ->get()
                        ->groupBy('course_id');

        $reports = Reports::where('student_id', '=', $id)
                        ->join('users', 'reports.user_id', '=', 'users.id')
                        ->join('subjects', 'reports.subject_id', '=', 'subjects.id')
                        ->join('courses', 'reports.course_id', '=', 'courses.id')
                        ->join('teachers', 'reports.teacher_id', '=', 'teachers.id')
                        ->select('reports.*', 'users.name as userName', 'users.email as userEmail', 'subjects.subjectName as subjectName', 'teachers.fullname as teacherFullname', 'courses.courseName', 'reports.course_id', 'teachers.fullname as teacherFullname')
                        ->get()
                        ->groupBy('course_id');

        if(!$student){
            return redirect('/other/students')->with('userErrors', '¡El estudiante no existe!');
        };

        return view('students.view', compact('student', 'grade', 'reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCourse($id)
    {
        $course = Course::where('id', $id)->first();

        if(!$course){
            return redirect('/other/grades')->with('userErrors', '¡El curso no existe!');
        };

        return view('other.editCourse', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSubject($id)
    {
        $subject = Subject::where('id', $id)->first();

        if(!$subject){
            return redirect('/other/all')->with('userErrors', '¡La materia no existe!');
        };

        return view('other.editSubject', compact('subject'));
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
        if(!$report){
            return redirect('/other/reports')->with('userErrors', '¡El reporte no existe!');
        };
        return view('reports.edit', compact('teachers', 'students', 'courses', 'subjects', 'report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRecord($id)
    {
        $students = Student::get();
        $courses = Course::get();
        $record = Record::where('id', $id)->first();
        if(!$record){
            return redirect('/other/grades')->with('userErrors', '¡El curso no existe!');
        };
        return view('records.edit', compact('students', 'courses', 'record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updateCourse(Request $request, $id)
    {
        $data = Course::where('id', $id)->first();
        $data->courseName = $request->courseName;
        $data->save();
        return back()->with('message', 'Curso actualizado con éxito.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updateSubject(Request $request, $id)
    {
        $data = Subject::where('id', $id)->first();
        $data->subjectName = $request->subjectName;
        $data->save();
        return back()->with('message', 'Materia actualizado con éxito.');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request, $id)
    {
        $data = Record::where('id', $id)->first();

        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->allergies = $request->allergies;
        $data->treatment = $request->treatment;
        $data->cardiovascular = $request->cardiovascular;
        $data->lice = $request->lice;
        $data->asthma = $request->asthma;
        $data->malformation = $request->malformation;
        $data->glasses = $request->glasses;
        $data->observations = $request->observations;
        $data->save();
        return back()->with('message', 'Ficha médica editada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroyCourse($id)
    {
        $data = Course::findOrFail( $id )->delete();
        return back()->with( 'message', 'Curso Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroySubject($id)
    {
        $data = Subject::findOrFail( $id )->delete();
        return back()->with( 'message', 'Materia Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroyReport($id)
    {
        $data = Reports::findOrFail( $id )->delete();
        return back()->with( 'message', 'Reporte Eliminado' );
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroyRecord($id)
    {
        $data = Record::findOrFail( $id )->delete();
        return back()->with( 'message', 'Ficha médica Eliminada' );
    }
}
