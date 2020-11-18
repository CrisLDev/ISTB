<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administration;

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
        $administrations = Administration::get();
        $teachers = Teacher::get();
        $students = Student::get();
        return view('people.all', compact('administrations', 'teachers', 'students'));
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
        $data = new Administration();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
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
        $data = new Student();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
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
        $data = new Teacher();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->dni = $request->dni;
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
    public function editStudent($id)
    {

        $people = Student::where('id', $id)->first();

        return view('people.edit', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {

        $people = Administration::where('id', $id)->first();

        return view('people.edit', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTeacher($id)
    {

        $people = Teacher::where('id', $id)->first();

        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTeacher(Request $request, $id)
    {
        $data = Teacher::where('id', $id)->first();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->dni = $request->dni;
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Profesor editado con éxito.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request, $id)
    {
        $data = Administration::where('id', $id)->first();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->dni = $request->dni;
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Personal editado con éxito.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request, $id)
    {
        $data = Student::where('id', $id)->first();
        $rules = [
            'fullname' => 'required|max:60',
            'telephoneNumber' => 'required|unique:administrations|max:10|numeric',
            'user_id' => 'required',
            'dni' => 'required|unique:administrations|max:15|numeric',
            'address' => 'required|max:40',
            'age' => 'required|max:2|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'user_id' => 'usuario',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->dni = $request->dni;
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return back()->with('message', 'Estudiante editado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($id)
    {
        $data = People::findOrFail( $id )->delete();
        return back()->with( 'message', 'Personal Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTeacher($id)
    {
        $data = People::findOrFail( $id )->delete();
        return back()->with( 'message', 'Profesor Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyStudent($id)
    {
        $data = People::findOrFail( $id )->delete();
        return back()->with( 'message', 'Estudiante Eliminado' );
    }
}
