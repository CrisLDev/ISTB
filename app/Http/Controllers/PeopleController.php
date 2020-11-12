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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.form');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function storeAdmin( Request $request ) {
        $data = new People();
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
        $data->type = 'administration';
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Personal agregado con éxito.');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function storeStudent( Request $request ) {
        $data = new People();
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
        $data->type = 'student';
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Estudiante agregado con éxito.');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function storeTeacher( Request $request ) {
        $data = new People();
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
        $data->type = 'teacher';
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Docente agregado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {

        $admin = People::where('id', $id)->first();

        return view('people.form', compact('admin'));
    }
}
