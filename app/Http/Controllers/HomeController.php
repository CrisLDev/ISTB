<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assistance;

use App\Models\Student;

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
        $courses = Course::count();
        $activities = Activity::count();

        return view('home', compact('students', 'adminis', 'teachers', 'users', 'courses', 'activities'));
    }
}
