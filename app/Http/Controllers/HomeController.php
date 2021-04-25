<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\DailyActivity;
use App\Models\Teacher;
use App\Models\Administration;
use App\Models\User;
use App\Models\Activity;
use App\Models\Course;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        $data = Assistance::join('students', 'assistances.student_id', '=', 'students.id')->selectRaw('count(*) as total, student_id')->havingRaw('total > 30 ')->groupBy('student_id')->get();

        return dd($data);*/

        $students = Student::count();
        $teachers = Teacher::count();
        $adminis = Administration::count();
        $users = User::count();
        $courses = Course::get();
        $activities = Activity::count();

        return view('home', compact('students', 'adminis', 'teachers', 'users', 'courses', 'activities'));
    }

    /**
     * Redirect to page with module table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function moduleController(Request $request)
    {
        return redirect(route('module.index', ['course_id'=>$request->course_id, 'date'=>$request->date]));
    }

    public function moduleTableController($course_id, $date)
    {
        $students = Student::where('students.course_id', $course_id)->get();
        $ids = array();
        $dasid = array();
        $asid = array();
        $idsNoContainActivities = array();
        $idsNoContainAssistances = array();
        $assistancesSearch = array();
        $activitiesSearch = array();
        $finalActivitiesSearch = array();
        $finalAssistancesSearch = array();
        foreach($students as $student)
        {
            $ids[] = $student->id;
        };
        foreach($ids as $id){
            $assistances = Assistance::where('student_id', $id)->whereDate('day', $date)->get();
            foreach($assistances as $assistance){
                array_push($assistancesSearch, $assistance);
                $asid[] = $assistance->student_id;
            }
            $activities = DailyActivity::where('student_id', $id)->whereDate('created_at', $date)->get();
            foreach($activities as $activity){
                array_push($activitiesSearch, $activity);
                $dasid[] = $activity->student_id;
            }
        }

        $idsNoContainActivities = array_diff($ids, $dasid);

        $idsNoContainAssistances = array_diff($ids, $asid);

        foreach($activitiesSearch as $activi){
            $toPush = array(
                "id" => $activi->id,
                "activity_id" => $activi->activity_id,
                "grade_id" => $activi->grade_id,
                "student_id" => $activi->student_id,
                "dailyActivityCheck" => $activi->dailyActivityCheck,
                "dailyActivityText" => $activi->dailyActivityText,
                "created_at" => $activi->created_at,
                "updated_at" => $activi->updated_at,
            );
            array_push($finalActivitiesSearch, $toPush);
        }

        foreach($assistancesSearch as $assistan){
            $toPusha = array(
                "id" => $assistan->id,
                "student_id" => $assistan->student_id,
                "day" => $assistan->day,
                "justification" => $assistan->justification,
                "created_at" => $assistan->created_at,
                "updated_at" => $assistan->updated_at,
            );
            array_push($finalAssistancesSearch, $toPusha);
        }

        foreach($idsNoContainActivities as $noIds){
            $toArray = array(
                "id" => 1,
                "activity_id" => "N/A",
                "grade_id" => 5,
                "student_id" => $noIds,
                "dailyActivityCheck" => "N/A",
                "dailyActivityText" => "N/A",
                "created_at" => "N/A",
                "updated_at" => "N/A");
            array_push($finalActivitiesSearch, $toArray);
            array_push($finalActivitiesSearch, $toArray);
            array_push($finalActivitiesSearch, $toArray);
            array_push($finalActivitiesSearch, $toArray);
            array_push($finalActivitiesSearch, $toArray);
        }

        foreach($idsNoContainAssistances as $noAids){
            $toArraya = array(
                "id" => 1,
                "student_id" => $noAids,
                "day" => '',
                "justification" => '',
                "created_at" => $assistan->created_at,
                "updated_at" => $assistan->updated_at);
            array_push($finalAssistancesSearch, $toArraya);
        }

        $reFinalActivitiesSearch = json_decode(json_encode($finalActivitiesSearch));

        $reFinalAssistancesSearch = json_decode(json_encode($finalAssistancesSearch));

        return view('table', compact('students', 'assistancesSearch', 'activitiesSearch','reFinalActivitiesSearch', 'reFinalAssistancesSearch'));
    }
}