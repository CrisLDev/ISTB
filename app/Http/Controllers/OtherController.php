<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Course;
use App\Models\Reports;
use App\Models\Grades;
use App\Models\Record;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function index(Request $request)
    {
        $activityName = $request->get('activityName');
        $courseName = $request->get('courseName');
        $activities = Activity::orderBy('id', 'desc')
        ->activityName($activityName)
        ->paginate(5);
        $courses = Course::orderBy('id', 'desc')
        ->courseName($courseName)
        ->paginate(5);
        return view('other.index', compact('activities', 'courses'));
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
        $activities = Activity::get();
        return view('other.reports', compact('teachers', 'students', 'courses', 'activities'));
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
    public function formGrades()
    {
        $students = Student::get();
        $courses = Course::get();
        return view('other.grades', compact('students', 'courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudents(Request $request)
    {
        $fullname = $request->get('fullname');
        $email = $request->get('email');
        $code = $request->get('code');
        $students = Student::orderBy('id', 'desc')
        ->fullname($fullname)
        ->email($email)
        ->code($code)
        ->paginate(5);
        return view('students.all', compact('students'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdministration(Request $request)
    {
        $fullname = $request->get('fullname');
        $email = $request->get('email');
        $code = $request->get('code');
        $administrations = Administration::orderBy('id', 'desc')
        ->fullname($fullname)
        ->email($email)
        ->code($code)
        ->paginate(5);
        return view('administration.all', compact('administrations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTeachers(Request $request)
    {
        $fullname = $request->get('fullname');
        $email = $request->get('email');
        $code = $request->get('code');
        $teachers = Teacher::orderBy('id', 'desc')
        ->fullname($fullname)
        ->email($email)
        ->code($code)
        ->paginate(5);
        return view('teachers.all', compact('teachers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports(Request $request)
    {
        $content = $request->get('content');
        $resume = $request->get('resume');
        $reports = Reports::join('users', 'reports.user_id', '=', 'users.id')
                            ->join('activities', 'reports.Activity_id', '=', 'activities.id')
                            ->join('courses', 'reports.course_id', '=', 'courses.id')
                            ->join('teachers', 'reports.teacher_id', '=', 'teachers.id')
                            ->join('students', 'reports.student_id', '=', 'students.id')
                            ->select('reports.*', 'reports.resume', 'reports.content', 'teachers.fullname as tFullname', 'students.fullname as sFullname', 'courses.courseName', 'activities.activityName')
                            ->content($content)
                            ->resume($resume)
                            ->paginate(5);
        return view('reports.all', compact('reports'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRecord(Request $request)
    {
        $allergies = $request->get('allergies');
        $treatment = $request->get('treatment');
        $cardiovascular = $request->get('cardiovascular');
        $lice = $request->get('lice');
        $asthma = $request->get('asthma');
        $glasses = $request->get('glasses');
        $malformation = $request->get('malformation');
        $records = Record::join('users', 'records.user_id', '=', 'users.id')
                        ->join('courses', 'records.course_id', '=', 'courses.id')
                        ->join('students', 'records.student_id', '=', 'students.id')
                        ->select('records.*', 'records.allergies', 'records.glasses', 'students.fullname as sFullname', 'courses.courseName', 'records.treatment', 'records.cardiovascular', 'records.lice', 'records.asthma', 'records.malformation', 'records.glasses', 'records.observations')
                        ->allergies($allergies)
                        ->treatment($treatment)
                        ->cardiovascular($cardiovascular)
                        ->lice($lice)
                        ->asthma($asthma)
                        ->glasses($glasses)
                        ->malformation($malformation)
                        ->paginate(5);
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
    public function storeActivity(Request $request)
    {
        $data = new Activity();
        $rules = [
            'activityName' => 'required|unique:activities|max:60',
        ];
        $niceNames = [
            'activityName' => 'nombre de la actividad'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->activityName = $request->activityName;
        $data->save();
        return back()->with('message', 'Actividad agregada con éxito.');
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
            'courseName' => 'required|unique:courses|max:5',
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
        $rules = [
            'resume' => 'required|unique:reports|max:100',
            'course_id' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'Activity_id' => 'required',
            'content' => 'required',
        ];
        $niceNames = [
            'resume' => 'resumen',
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'teacher_id' => 'docente',
            'Activity_id' => 'id de la actividad',
            'content' => 'contenido',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->resume = $request->resume;
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->Activity_id = $request->Activity_id;
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
    public function storeGrades(Request $request)
    {
        $data = new Grades();
        $rules = [
            'resume' => 'required|unique:reports|max:100',
            'course_id' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'Activity_id' => 'required',
            'content' => 'required',
        ];
        $niceNames = [
            'resume' => 'resumen',
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'teacher_id' => 'docente',
            'Activity_id' => 'id de la actividad',
            'content' => 'contenido',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->resume = $request->resume;
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->Activity_id = $request->Activity_id;
        $data->content = $request->content;
        $data->save();
        return back()->with('message', 'Nota agregada correctamente agregado con éxito.');
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
        $rules = [
            'course_id' => 'required',
            'student_id' => 'required',
            'cardiovascular' => 'required',
            'lice' => 'required',
            'asthma' => 'required',
            'glasses' => 'required'
        ];
        $niceNames = [
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'cardiovascular' => 'campo enfermedades cardiovasculares',
            'lice' => 'campo piojos',
            'asthma' => 'campo asma',
            'glasses' => 'campo lentes'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
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

        $records = Record::where('student_id', '=', $id)
                        ->join('users', 'records.user_id', '=', 'users.id')
                        ->join('courses', 'records.course_id', '=', 'courses.id')
                        ->select('records.*', 'users.name as userName', 'users.email as userEmail', 'courses.courseName')
                        ->paginate(1, ['*'], 'records');                       

        $reports = Reports::where('student_id', '=', $id)
                        ->join('users', 'reports.user_id', '=', 'users.id')
                        ->join('activities', 'reports.Activity_id', '=', 'activities.id')
                        ->join('courses', 'reports.course_id', '=', 'courses.id')
                        ->join('teachers', 'reports.teacher_id', '=', 'teachers.id')
                        ->select('reports.*', 'users.name as userName', 'users.email as userEmail', 'activities.activityName as activityName', 'teachers.fullname as teacherFullname', 'courses.courseName', 'reports.course_id', 'teachers.fullname as teacherFullname')
                        ->paginate(1, ['*'], 'reports');

        if(!$student){
            return redirect('/other/students')->with('userErrors', '¡El estudiante no existe!');
        };

        return view('students.view', compact('student', 'records', 'reports'));
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
    public function editActivity($id)
    {
        $activity = Activity::where('id', $id)->first();

        if(!$activity){
            return redirect('/other/all')->with('userErrors', '¡La actividad no existe!');
        };

        return view('other.editActivity', compact('activity'));
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
        $activities = Activity::get();
        $report = Reports::where('id', $id)->first();
        if(!$report){
            return redirect('/other/reports')->with('userErrors', '¡El reporte no existe!');
        };
        return view('reports.edit', compact('teachers', 'students', 'courses', 'activities', 'report'));
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
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function updateCourse(Request $request, $id)
    {
        $data = Course::where('id', $id)->first();
        $rules = [
            'courseName' => ['required',Rule::unique('courses')->ignore($id),'max:6']
        ];
        $niceNames = [
            'courseName' => 'nombre del curso'
        ];
        if($id == $data->id){
            $data->courseName = $request->courseName;
        $data->save();
        return back()->with('message', 'Curso actualizado con éxito.');
        }
        return back()->with('userErrors', 'El curso ya existe.');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function updateActivity(Request $request, $id)
    {
        $data = Activity::where('id', $id)->first();
        $rules = [
            'activityName' => ['required',Rule::unique('activities')->ignore($id),'max:60']
        ];
        $niceNames = [
            'activityName' => 'nombre de la actividad'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->activityName = $request->activityName;
            $data->save();
            return back()->with('message', 'Actividad actualizado con éxito.');
        }

        return back()->with('userErrors', 'La actividad ya existe.');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function updateReport(Request $request, $id)
    {
        $data = Reports::where('id', $id)->first();
        $rules = [
            'resume' => 'required|max:100',
            'course_id' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'Activity_id' => 'required',
            'content' => 'required',
        ];
        $niceNames = [
            'resume' => 'resumen',
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'teacher_id' => 'docente',
            'Activity_id' => 'id de la actividad',
            'content' => 'contenido',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->resume = $request->resume;
            $data->course_id = $request->course_id;
            $data->student_id = $request->student_id;
            $data->teacher_id = $request->teacher_id;
            $data->Activity_id = $request->Activity_id;
            $data->content = $request->content;
            $data->save();
            return back()->with('message', 'Reporte editado con éxito.');
        }

        return back()->with('userErrors', 'El reporte ya existe.');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request, $id)
    {
        $data = Record::where('id', $id)->first();
        $rules = [
            'course_id' => 'required',
            'student_id' => 'required',
            'cardiovascular' => 'required',
            'lice' => 'required',
            'asthma' => 'required',
            'glasses' => 'required'
        ];
        $niceNames = [
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'cardiovascular' => 'campo enfermedades cardiovasculares',
            'lice' => 'campo piojos',
            'asthma' => 'campo asma',
            'glasses' => 'campo lentes'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
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

        return back()->with('userErrors', 'Ficha médica ya existe.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $Activity
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
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function destroyActivity($id)
    {
        $data = Activity::findOrFail( $id )->delete();
        return back()->with( 'message', 'Actividad Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $Activity
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
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function destroyRecord($id)
    {
        $data = Record::findOrFail( $id )->delete();
        return back()->with( 'message', 'Ficha médica Eliminada' );
    }
}
