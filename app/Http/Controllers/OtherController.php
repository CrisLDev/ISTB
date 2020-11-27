<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\DailyActivity;
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
        $activities = Activity::get();
        return view('other.grades', compact('students', 'courses', 'activities'));
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
            'course_id' => 'required',
            'student_id' => 'required',
        ];
        $niceNames = [
            'course_id' => 'curso',
            'student_id' => 'estudiante'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->user_id = auth()->user()->id;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->save();
        $idd = $data->id;
        if($request->activity1_id !== '' || $request->activity1 !== '' || $request->answer1 !== ''){
            $rules1 = [
                'activity1_id' => 'required',
                'activity1' => 'required',
                'answer1' => 'required',
            ];
            $niceNames1 = [
                'activity1_id' => 'campo actividad 1',
                'activity1' => 'campo nombre de actividad 1',
                'answer1' => 'campo actividad cumplida 1'
            ]; 
            $this->validate($request, $rules1, [], $niceNames1);
            if($request->activity1_id && $request->activity1 && $request->answer1){
                $dataA1 = new DailyActivity();
                $dataA1->grade_id = $idd;
                $dataA1->student_id = $request->student_id;
                $dataA1->activity_id = $request->activity1_id;
                $dataA1->dailyActivityText = $request->activity1;
                $dataA1->dailyActivityCheck = $request->answer1;
                $dataA1->save();
            }else{
                back()->with('message', 'Completa toda la actividad.');
            }
        }
        if($request->activity2_id !== '' || $request->activity2 !== '' || $request->answer2 !== ''){
            $rules2 = [
                'activity2_id' => 'required',
                'activity2' => 'required',
                'answer2' => 'required',
            ];
            $niceNames2 = [
                'activity2_id' => 'campo actividad 2',
                'activity2' => 'campo nombre de actividad 2',
                'answer2' => 'campo actividad cumplida 2'
            ]; 
            $this->validate($request, $rules2, [], $niceNames2);
            if($request->activity2_id && $request->activity2 && $request->answer2){
                $dataA2 = new DailyActivity();
                $dataA2->grade_id = $idd;
                $dataA2->student_id = $request->student_id;
                $dataA2->activity_id = $request->activity2_id;
                $dataA2->dailyActivityText = $request->activity2;
                $dataA2->dailyActivityCheck = $request->answer2;
                $dataA2->save();
            }else{
                back()->with('message', 'Completa toda la actividad.');
            }
        }
        if($request->activity3_id !== '' || $request->activity3 !== '' || $request->answer3 !== ''){
            $rules3 = [
                'activity3_id' => 'required',
                'activity3' => 'required',
                'answer3' => 'required',
            ];
            $niceNames3 = [
                'activity3_id' => 'campo actividad 3',
                'activity3' => 'campo nombre de actividad 3',
                'answer3' => 'campo actividad cumplida 3'
            ]; 
            $this->validate($request, $rules3, [], $niceNames3);
            if($request->activity3_id && $request->activity3 && $request->answer3){
                $dataA3 = new DailyActivity();
                $dataA3->grade_id = $idd;
                $dataA3->student_id = $request->student_id;
                $dataA3->activity_id = $request->activity3_id;
                $dataA3->dailyActivityText = $request->activity3;
                $dataA3->dailyActivityCheck = $request->answer3;
                $dataA3->save();
            }else{
                back()->with('message', 'Completa toda la actividad.');
            }
        }
        if($request->activity4_id !== '' || $request->activity4 !== '' || $request->answer4 !== ''){
            $rules4 = [
                'activity4_id' => 'required',
                'activity4' => 'required',
                'answer4' => 'required',
            ];
            $niceNames4 = [
                'activity4_id' => 'campo actividad 4',
                'activity4' => 'campo nombre de actividad 4',
                'answer4' => 'campo actividad cumplida 4'
            ]; 
            $this->validate($request, $rules4, [], $niceNames4);
            if($request->activity4_id && $request->activity4 && $request->answer4){
                $dataA4 = new DailyActivity();
                $dataA4->grade_id = $idd;
                $dataA4->student_id = $request->student_id;
                $dataA4->activity_id = $request->activity4_id;
                $dataA4->dailyActivityText = $request->activity4;
                $dataA4->dailyActivityCheck = $request->answer4;
                $dataA4->save();
            }else{
                back()->with('message', 'Completa toda la actividad.');
            }
        }
        if($request->activity5_id !== '' || $request->activity5 !== '' || $request->answer5 !== ''){
            $rules5 = [
                'activity5_id' => 'required',
                'activity5' => 'required',
                'answer5' => 'required',
            ];
            $niceNames5 = [
                'activity5_id' => 'campo actividad 5',
                'activity5' => 'campo nombre de actividad 5',
                'answer5' => 'campo actividad cumplida 5'
            ]; 
            $this->validate($request, $rules5, [], $niceNames5);
            if($request->activity5_id && $request->activity5 && $request->answer5){
                $dataA5 = new DailyActivity();
                $dataA5->grade_id = $idd;
                $dataA5->student_id = $request->student_id;
                $dataA5->activity_id = $request->activity5_id;
                $dataA5->dailyActivityText = $request->activity5;
                $dataA5->dailyActivityCheck = $request->answer5;
                $dataA5->save();
            }else{
                back()->with('message', 'Completa toda la actividad.');
            }
        }
        return back()->with('message', 'Calificación agregada correctamente agregado con éxito.');
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

        $dailyActivities = DailyActivity::where('student_id', $id)->paginate(5, ['*'], 'dactivities');


        if(!$student){
            return redirect('/other/students')->with('userErrors', '¡El estudiante no existe!');
        };

        return view('students.view', compact('student', 'records', 'reports', 'dailyActivities'));
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
    public function editDaily($id)
    {
        $dailyactivity = DailyActivity::where('id', $id)->first();

        if(!$dailyactivity){
            return redirect('/other/students')->with('userErrors', '¡La actividad diaria no existe!');
        };

        return view('other.editDailyActivity', compact('dailyactivity'));
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
    public function updateDaily(Request $request, $id)
    {
        $data = DailyActivity::where('id', $id)->first();
        $rules = [
            'dailyActivityCheck' => 'required',
            'dailyActivityText' => 'required',
        ];
        $niceNames = [
            'dailyActivityCheck' => 'campo nombre de actividad',
            'dailyActivityText' => 'campo actividad cumplida'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->dailyActivityCheck = $request->dailyActivityCheck;
            $data->dailyActivityText = $request->dailyActivityText;
            $data->save();
            return back()->with('message', 'Actividad diaria editada con éxito.');
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
