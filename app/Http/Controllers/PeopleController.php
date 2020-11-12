<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\People;

class PeopleController extends Controller
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
        $peoples = People::get();
        return view('people.all', compact('peoples'));
    }
}
