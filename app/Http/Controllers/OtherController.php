<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\DailyActivity;
use App\Models\Assistance;
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
    public function gradesByStudents($id)
    {
        $activities = DailyActivity::where('student_id', $id)->get();
        $activitiesTotal = DailyActivity::where('student_id', $id)->paginate(5);
        $ids = array();
        foreach($activities as $activity)
        {
            $ids[] = $activity->dailyActivityCheck;
        };
        function suma($carry, $item)
        {
            $carry += $item;
            return $carry;
        }
        $allSumNote = array_sum($ids);
        if(count($ids) > 0){
            $finalNote = $allSumNote / count($ids);
        }else{
            $finalNote = 0;
        }
        return view('grades.gradesByStudent', compact('activitiesTotal', 'allSumNote', 'finalNote'));
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
        $courses = Course::get();
        $activities = Activity::get();
        return view('other.grades', compact('courses', 'activities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudents(Request $request)
    {
        if(auth()->user()->role === 'coor'){
            $fullname = $request->get('fullname');
            $email = $request->get('email');
            $code = $request->get('code');
            $students = Student::orderBy('id', 'desc')
            ->fullname($fullname)
            ->email($email)
            ->code($code)
            ->paginate(5);
            return view('students.all', compact('students'));
        }else{
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdministration(Request $request)
    {
        if(auth()->user()->role === 'coor'){
            $fullname = $request->get('fullname');
            $email = $request->get('email');
            $code = $request->get('code');
            $administrations = Administration::orderBy('id', 'desc')
            ->fullname($fullname)
            ->email($email)
            ->code($code)
            ->where('user_id', auth()->user()->id)
            ->paginate(5);
            return view('administration.all', compact('administrations'));
        }else{
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTeachers(Request $request)
    {
        if(auth()->user()->role === 'coor'){
            $fullname = $request->get('fullname');
            $email = $request->get('email');
            $code = $request->get('code');
            $teachers = Teacher::orderBy('id', 'desc')
            ->fullname($fullname)
            ->email($email)
            ->code($code)
            ->where('user_id', auth()->user()->id)
            ->paginate(5);
            return view('teachers.all', compact('teachers'));
        }else{
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports(Request $request)
    {   
        if(auth()->user()->role === 'coor'){
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
                            ->where('reports.user_id', auth()->user()->id)
                            ->paginate(5);
        return view('reports.all', compact('reports'));
        }else{
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRecord(Request $request)
    {
        if(auth()->user()->role === 'coor'){
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
                        ->where('records.user_id', auth()->user()->id)
                        ->paginate(5);
        return view('records.all', compact('records'));
        }else{
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
            'courseName' => 'required|unique:courses|max:40',
            'ageRange' => 'required|numeric|max:3',
            'startDate' => 'required',
            'endDate' => 'required'
        ];
        $niceNames = [
            'courseName' => 'nombre del curso',
            'ageRange' => 'rango de edad',
            'startDate' => 'campo hora de inicio',
            'endDate' => 'campo hora de fin'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->courseName = $request->courseName;
        $data->ageRange = $request->ageRange;
        $data->startDate = $request->startDate;
        $data->endDate = $request->endDate;
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
        $rules = [
            'student_id' => 'required',
            'date' => 'required'
        ];
        $niceNames = [
            'student_id' => 'estudiante',
            'date' => 'fecha'
        ];
        $theDate = date_create($request->date);
        $currentDate = date_format($theDate,"Y-m-d");
        $da = DailyActivity::whereDate('created_at', $currentDate)->where('student_id', $request->student_id)->get();
        if(count($da) > 0){
            return back()->with('userErrors', 'Ya registraste las actividades de este día.');
        }
        $this->validate($request, $rules, [], $niceNames);

                $data2 =  new Assistance();
                $data2->justification = $request->justification;
                $data2->student_id = $request->student_id;
                $data2->day = $request->date;
                $data2->save();

                $dataA1 = new DailyActivity();
                $dataA1->student_id = $request->student_id;
                $dataA1->activity_id = $request->activity1_id;
                $dataA1->dailyActivityText = $request->activity1;
                $dataA1->dailyActivityCheck = $request->answer1;
                $dataA1->dailyActivityJustification = $request->justification1;
                $dataA1->created_at = $request->date;
                $dataA1->save();
        
                $dataA2 = new DailyActivity();
                $dataA2->student_id = $request->student_id;
                $dataA2->activity_id = $request->activity2_id;
                $dataA2->dailyActivityText = $request->activity2;
                $dataA2->dailyActivityCheck = $request->answer2;
                $dataA2->dailyActivityJustification = $request->justification2;
                $dataA2->created_at = $request->date;
                $dataA2->save();

                $dataA3 = new DailyActivity();
                $dataA3->student_id = $request->student_id;
                $dataA3->activity_id = $request->activity3_id;
                $dataA3->dailyActivityText = $request->activity3;
                $dataA3->dailyActivityCheck = $request->answer3;
                $dataA3->dailyActivityJustification = $request->justification3;
                $dataA3->created_at = $request->date;
                $dataA3->save();

                $dataA4 = new DailyActivity();
                $dataA4->student_id = $request->student_id;
                $dataA4->activity_id = $request->activity4_id;
                $dataA4->dailyActivityText = $request->activity4;
                $dataA4->dailyActivityCheck = $request->answer4;
                $dataA4->dailyActivityJustification = $request->justification4;
                $dataA4->created_at = $request->date;
                $dataA4->save();

                $dataA5 = new DailyActivity();
                $dataA5->student_id = $request->student_id;
                $dataA5->activity_id = $request->activity5_id;
                $dataA5->dailyActivityText = $request->activity5;
                $dataA5->dailyActivityCheck = $request->answer5;
                $dataA5->dailyActivityJustification = $request->justification5;
                $dataA5->created_at = $request->date;
                $dataA5->save();

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
        $course_id = substr($request->student_id, 2);
        $student_id = substr($request->student_id, 0, -2);
        $data = new Record();
        $rules = [
            'student_id' => 'required',
            'cardiovascular' => 'required',
            'lice' => 'required',
            'asthma' => 'required',
            'glasses' => 'required'
        ];
        $niceNames = [
            'student_id' => 'estudiante',
            'cardiovascular' => 'campo enfermedades cardiovasculares',
            'lice' => 'campo piojos',
            'asthma' => 'campo asma',
            'glasses' => 'campo lentes'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->user_id = auth()->user()->id;
        $data->course_id = $course_id;
        $data->student_id = $student_id;
        $data->allergies = $request->allergies;
        $data->treatment = $request->treatment;
        $data->cardiovascular = $request->cardiovascular;
        $data->lice = $request->lice;
        $data->asthma = $request->asthma;
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

        $assistances = Assistance::where('student_id', $student->id)->where('justification', '!=', null)->count();

        $course = Course::where('id', $student->course_id)->first();

        if(!$student){
            return redirect('/other/students')->with('userErrors', '¡El estudiante no existe!');
        };

        return view('students.view', compact('student', 'course', 'records', 'reports', 'dailyActivities', 'assistances'));
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
        if(auth()->user()->role === 'coor'){
        $teachers = Teacher::get();
        $students = Student::get();
        $courses = Course::get();
        $activities = Activity::get();
        $report = Reports::where('id', $id)->first();
        if($report->user_id === auth()->user()->id){
        if(!$report){
            return redirect('/other/reports')->with('userErrors', '¡El reporte no existe!');
        };
        return view('reports.edit', compact('teachers', 'students', 'courses', 'activities', 'report'));
        }else{
            return redirect('/home')->with('messageError', '¡No tienes permisos!');
        }
    }else{
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRecord($id)
    {   
        if(auth()->user()->role === 'coor'){
        $students = Student::get();
        $courses = Course::get();
        $record = Record::where('id', $id)->first();
        if($record->user_id === auth()->user()->id){
        if(!$record){
            return redirect('/other/grades')->with('userErrors', '¡El curso no existe!');
        };
        return view('records.edit', compact('students', 'courses', 'record'));
    }else{
        return redirect('/home')->with('messageError', '¡No tienes permisos!');
    }
    }else{
        $students = Student::get();
        $courses = Course::get();
        $record = Record::where('id', $id)->first();
        if(!$record){
            return redirect('/other/grades')->with('userErrors', '¡El curso no existe!');
        };
        return view('records.edit', compact('students', 'courses', 'record'));
    }
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
            'courseName' => ['required',Rule::unique('courses')->ignore($id),'max:40'],
            'ageRange' => 'required|numeric|max:3',
            'startDate' => 'required',
            'endDate' => 'required'
        ];
        $niceNames = [
            'courseName' => 'nombre del curso',
            'ageRange' => 'rango de edad',
            'startDate' => 'campo hora de inicio',
            'endDate' => 'campo hora de fin'
            
        ];
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->courseName = $request->courseName;
            $data->ageRange = $request->ageRange;
            $data->startDate = $request->startDate;
        $data->endDate = $request->endDate;
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
        if(auth()->user()->role === 'coor'){
        $data = Reports::where('id', $id)->first();
        if($data->user_id === auth()->user()->id){
        $rules = [
            'resume' => 'required|max:100',
            'course_id' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'activity_id' => 'required',
            'content' => 'required',
        ];
        $niceNames = [
            'resume' => 'resumen',
            'course_id' => 'curso',
            'student_id' => 'estudiante',
            'teacher_id' => 'docente',
            'activity_id' => 'id de la actividad',
            'content' => 'contenido',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->resume = $request->resume;
            $data->course_id = $request->course_id;
            $data->student_id = $request->student_id;
            $data->teacher_id = $request->teacher_id;
            $data->activity_id = $request->activity_id;
            $data->content = $request->content;
            $data->save();
            return back()->with('message', 'Reporte editado con éxito.');
        }

        return back()->with('userErrors', 'El reporte ya existe.');
    }else{
        return redirect('/home')->with('messageError', '¡No tienes permisos!');
    }
}else{
    $data = Reports::where('id', $id)->first();
    $rules = [
        'resume' => 'required|max:100',
        'course_id' => 'required',
        'student_id' => 'required',
        'teacher_id' => 'required',
        'activity_id' => 'required',
        'content' => 'required',
    ];
    $niceNames = [
        'resume' => 'resumen',
        'course_id' => 'curso',
        'student_id' => 'estudiante',
        'teacher_id' => 'docente',
        'activity_id' => 'id de la actividad',
        'content' => 'contenido',
    ]; 
    $this->validate($request, $rules, [], $niceNames);
    if($id == $data->id){
        $data->resume = $request->resume;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->teacher_id = $request->teacher_id;
        $data->activity_id = $request->activity_id;
        $data->content = $request->content;
        $data->save();
        return back()->with('message', 'Reporte editado con éxito.');
    }

    return back()->with('userErrors', 'El reporte ya existe.');
}
        
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
            'activity_id' => 'required',
        ];
        $niceNames = [
            'dailyActivityCheck' => 'campo nombre de actividad',
            'dailyActivityText' => 'campo actividad cumplida',
            'activity_id' => 'campo actividad diaria'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->dailyActivityCheck = $request->dailyActivityCheck;
            $data->dailyActivityText = $request->dailyActivityText;
            $data->activity_id = $request->activity_id;
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
        $course_id = substr($request->student_id, 2);
        $student_id = substr($request->student_id, 0, -2);
        if(auth()->user()->role === 'coor'){
        $data = Record::where('id', $id)->first();
        if($data->user_id === auth()->user()->id){
        $rules = [
            'student_id' => 'required',
            'cardiovascular' => 'required',
            'lice' => 'required',
            'asthma' => 'required',
            'glasses' => 'required'
        ];
        $niceNames = [
            'student_id' => 'estudiante',
            'cardiovascular' => 'campo enfermedades cardiovasculares',
            'lice' => 'campo piojos',
            'asthma' => 'campo asma',
            'glasses' => 'campo lentes'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->user_id = auth()->user()->id;
            $data->course_id = $course_id;
            $data->student_id = $student_id;
            $data->allergies = $request->allergies;
            $data->treatment = $request->treatment;
            $data->cardiovascular = $request->cardiovascular;
            $data->lice = $request->lice;
            $data->asthma = $request->asthma;
            $data->glasses = $request->glasses;
            $data->observations = $request->observations;
            $data->save();
            return back()->with('message', 'Ficha médica editada con éxito.');
        }

        return back()->with('userErrors', 'Ficha médica ya existe.');
    }else{
        return redirect('/home')->with('messageError', '¡No tienes permisos!');
    }
}else{
    $data = Record::where('id', $id)->first();
    $rules = [
        'student_id' => 'required',
        'cardiovascular' => 'required',
        'lice' => 'required',
        'asthma' => 'required',
        'glasses' => 'required'
    ];
    $niceNames = [
        'student_id' => 'estudiante',
        'cardiovascular' => 'campo enfermedades cardiovasculares',
        'lice' => 'campo piojos',
        'asthma' => 'campo asma',
        'glasses' => 'campo lentes'
    ]; 
    $this->validate($request, $rules, [], $niceNames);
    if($id == $data->id){
        $data->user_id = auth()->user()->id;
        $data->course_id = $course_id;
        $data->student_id = $student_id;
        $data->allergies = $request->allergies;
        $data->treatment = $request->treatment;
        $data->cardiovascular = $request->cardiovascular;
        $data->lice = $request->lice;
        $data->asthma = $request->asthma;
        $data->glasses = $request->glasses;
        $data->observations = $request->observations;
        $data->save();
        return back()->with('message', 'Ficha médica editada con éxito.');
    }

    return back()->with('userErrors', 'Ficha médica ya existe.');
}
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
        if(auth()->user()->role === 'coor'){
        $data = Reports::where('id', $id)->first();
        if($data->user_id === auth()->user()->id){
            $data = Reports::findOrFail( $id )->delete();
        }else{
            return redirect('/home')->with('messageError', '¡No tienes permisos!');
        }
    }else{
        $data = Reports::findOrFail( $id )->delete();
    }
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
        if(auth()->user()->role === 'coor'){
        $data = Record::where('id', $id)->first();
        if($data->user_id === auth()->user()->id){
            $data2 = Record::findOrFail( $id )->delete();
        }else{
            return redirect('/home')->with('messageError', '¡No tienes permisos!');
        }
    }else{
        $data3 = Record::findOrFail( $id )->delete();
    }
        return back()->with( 'message', 'Ficha médica Eliminada' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function destroyDaily($id)
    {
        $data = DailyActivity::findOrFail( $id )->delete();
        return back()->with( 'message', 'Actividad diaria Eliminada' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editStudentGrade($id, $date)
    {
        $activities = DailyActivity::where('student_id', $id)->whereDate('created_at', $date)->get();
        $assistances = Assistance::where('student_id', $id)->whereDate('day', $date)->first();
        return view('other.editStudentGrade', compact('activities', 'assistances', 'id', 'date'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateGradeByDate($id, $date, Request $request)
    {
                if($request->id1){
                    $dataA1 = DailyActivity::where('id', $request->id1)->first();
                }else{
                    $dataA1 = new DailyActivity();
                    $dataA1->student_id = $id;
                }
                $dataA1->activity_id = $request->activity1_id;
                $dataA1->dailyActivityText = $request->activity1;
                $dataA1->dailyActivityCheck = $request->answer1;
                $dataA1->save();
                if($request->id1){
                    $dataA2 = DailyActivity::where('id', $request->id2)->first();
                }else{
                    $dataA2 = new DailyActivity();
                    $dataA2->student_id = $id;
                }
                $dataA2->activity_id = $request->activity2_id;
                $dataA2->dailyActivityText = $request->activity2;
                $dataA2->dailyActivityCheck = $request->answer2;
                $dataA2->save();
                if($request->id1){
                    $dataA3 = DailyActivity::where('id', $request->id3)->first();
                }else{
                    $dataA3 = new DailyActivity();
                    $dataA3->student_id = $id;
                }
                $dataA3->activity_id = $request->activity3_id;
                $dataA3->dailyActivityText = $request->activity3;
                $dataA3->dailyActivityCheck = $request->answer3;
                $dataA3->save();
                if($request->id1){
                    $dataA4 = DailyActivity::where('id', $request->id4)->first();
                }else{
                    $dataA4 = new DailyActivity();
                    $dataA4->student_id = $id;
                }
                $dataA4->activity_id = $request->activity4_id;
                $dataA4->dailyActivityText = $request->activity4;
                $dataA4->dailyActivityCheck = $request->answer4;
                $dataA4->save();
                if($request->id1){
                    $dataA5 = DailyActivity::where('id', $request->id5)->first();
                }else{
                    $dataA5 = new DailyActivity();
                    $dataA5->student_id = $id;
                }
                $dataA5->activity_id = $request->activity5_id;
                $dataA5->dailyActivityText = $request->activity5;
                $dataA5->dailyActivityCheck = $request->answer5;
                $dataA5->save();
                $data2 = Assistance::where('student_id', $id)->where('day', $date)->where('id', $request->assistanceId)->first();
            if($data2){
                $data2->justification = $request->justification;
                $data2->save();
            }else{
                $data2 = new Assistance();
                $data2->justification = $request->justification;
                $data2->student_id = $id;
                $data2->day = $date;
                $data2->save();
            }
        return back()->with('message', 'Calificación editada con éxito.');
    }

    
}