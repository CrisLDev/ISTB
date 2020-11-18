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
    public function formGrades()
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
        $reports = Reports::join('users', 'reports.user_id', '=', 'users.id')
                            ->join('subjects', 'reports.subject_id', '=', 'subjects.id')
                            ->join('courses', 'reports.course_id', '=', 'courses.id')
                            ->join('teachers', 'reports.teacher_id', '=', 'teachers.id')
                            ->join('students', 'reports.student_id', '=', 'students.id')
                            ->get();
        return view('reports.all', compact('reports'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGrades()
    {
        $grades = Grades::join('users', 'grades.user_id', '=', 'users.id')
                        ->join('subjects', 'grades.subject_id', '=', 'subjects.id')
                        ->join('courses', 'grades.course_id', '=', 'courses.id')
                        ->join('teachers', 'grades.teacher_id', '=', 'teachers.id')
                        ->join('students', 'grades.student_id', '=', 'students.id')
                        ->select('grades.*', 'grades.grade', 'grades.assistance', 'teachers.fullname as tFullname', 'students.fullname as sFullname', 'courses.courseName', 'subjects.subjectName')
                        ->get();
        return view('grades.all', compact('grades'));
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
    public function editGrade($id)
    {
        $teachers = Teacher::get();
        $students = Student::get();
        $courses = Course::get();
        $subjects = Subject::get();
        $grade = Grades::where('id', $id)->first();
        if(!$grade){
            return redirect('/other/grades')->with('userErrors', '¡El curso no existe!');
        };
        return view('grades.edit', compact('teachers', 'students', 'courses', 'subjects', 'grade'));
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
    public function updateGrade(Request $request, $id)
    {
        $data = Grades::where('id', $id)->first();

        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->subject_id = $request->subject_id;
        $data->grade = $request->grade;
        $data->assistance = $request->assistance;
        $data->save();
        return back()->with('message', 'Nota editada con éxito.');
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
    public function destroyGrade($id)
    {
        $data = Grades::findOrFail( $id )->delete();
        return back()->with( 'message', 'Nota Eliminada' );
    }
}
