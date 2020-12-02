<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Administration;
use Illuminate\Validation\Rule;

use App\Models\Assistance;

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
        $courses = Course::get();
        return view('people.form', compact('courses'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function storeAdmin( Request $request ) 
    {
        $data = new Administration();
        $rules = [
            'fullname' => 'required|max:60',
            'birthDate' => 'required|date',
            'telephoneNumber' => 'required|unique:administrations|numeric|max:9999999999',
            'dni' => 'required|unique:administrations|numeric|max:999999999999999',
            'role' => 'required|max:60|min:5',
            'address' => 'required|max:40',
            'age' => 'required|max:100|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'role' => 'cargo',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->birthDate = $request->birthDate;
        $data->role = $request->role;
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

    public function storeStudent( Request $request ) 
    {
        $data = new Student();
        $rules = [
            'fullname' => 'required|max:60',
            'birthDate' => 'required|date',
            'telephoneNumber' => 'required|unique:students|numeric|max:9999999999',
            'dni' => 'required|unique:students|numeric|max:999999999999999',
            'address' => 'required|max:40',
            'age' => 'required|max:6|numeric',
            'email' => 'required|max:50',
            'fatherName' => 'required|max:50',
            'dniFather' => 'required|unique:students|numeric|max:999999999999999',
            'motherName' => 'required|max:50',
            'dniMother' => 'required|unique:students|numeric|max:999999999999999',
            'vaccinationCard' => 'required',
            'memorandumOfAssociation' => 'required'
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
            'fatherName' => 'nombre del padre',
            'dniFather' => 'numero de cedula del padre',
            'motherName' => 'nombre de la madre',
            'dniMother' => 'numero de cedula de la madre',
            'vaccinationCard' => 'carnet de vacunacion',
            'memorandumOfAssociation' => 'acta de nacimiento'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $courseD = explode("+", $request->course_id);
        $datee = date("Y");
        $studentsCuantity = Student::where('course_id', $courseD[0])->whereYear('created_at', $datee)->get();
        if($request->age != $courseD[1]){
            return back()->withInput()->with('userErrors', 'El rango de edad permitida en este curso es de '.$courseD[1].'.');
        }
        if(count($studentsCuantity) > 8){
            return back()->withInput()->with('userErrors', 'El curso esta lleno para este ciclo.');
        }
        $data->fullname = $request->fullname;
        $data->birthDate = $request->birthDate;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->user_id = auth()->user()->id;
        $data->course_id = $courseD[0];
        $data->dni = $request->dni;
        $data->code = rand();
        $data->address = $request->address;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->fatherName = $request->fatherName;
        $data->dniFather = $request->dniFather;
        $data->motherName = $request->motherName;
        $data->dniMother = $request->dniMother;
        $data->vaccinationCard = $request->vaccinationCard;
        $data->memorandumOfAssociation = $request->memorandumOfAssociation;
        $data->save();
        $idd = $data->id;
        $data2 = new Assistance();
        $data2->student_id = $idd;
        $data2->save();
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
            'birthDate' => 'required|date',
            'telephoneNumber' => 'required|unique:teachers|numeric|max:9999999999',
            'dni' => 'required|unique:teachers|numeric|max:999999999999999',
            'address' => 'required|max:40',
            'age' => 'required|max:100|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->fullname = $request->fullname;
        $data->birthDate = $request->birthDate;
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
            'birthDate' => 'required|date',
            'telephoneNumber' => ['required',Rule::unique('teachers')->ignore($id),'numeric', 'max:9999999999'],
            'dni' => ['required',Rule::unique('teachers')->ignore($id),'numeric', 'max:999999999999999'],
            'address' => 'required|max:40',
            'age' => 'required|max:100|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->fullname = $request->fullname;
            $data->birthDate = $request->birthDate;
            $data->telephoneNumber = $request->telephoneNumber;
            $data->dni = $request->dni;
            $data->code = rand();
            $data->address = $request->address;
            $data->age = $request->age;
            $data->email = $request->email;
            $data->save();
            return back()->with('message', 'Docente editado con éxito.');
        }

        return back()->with('userErrors', 'El docente ya existe.');
        
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
            'birthDate' => 'required|date',
            'telephoneNumber' => ['required',Rule::unique('administrations')->ignore($id),'numeric', 'max:9999999999'],
            'dni' => ['required',Rule::unique('administrations')->ignore($id),'numeric', 'max:999999999999999'],
            'role' => 'required|max:60|min:5',
            'address' => 'required|max:40',
            'age' => 'required|max:100|numeric',
            'email' => 'required|max:50',
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'role' => 'cargo',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->fullname = $request->fullname;
            $data->birthDate = $request->birthDate;
            $data->telephoneNumber = $request->telephoneNumber;
            $data->role = $request->role;
            $data->dni = $request->dni;
            $data->code = rand();
            $data->address = $request->address;
            $data->age = $request->age;
            $data->email = $request->email;
            $data->save();
            return back()->with('message', 'Personal editado con éxito.');
        }

        return back()->with('userErrors', 'El nombre del personal ya existe.');
        
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
            'birthDate' => 'required|date',
            'telephoneNumber' => ['required',Rule::unique('students')->ignore($id),'numeric', 'max:9999999999'],
            'dni' => ['required',Rule::unique('students')->ignore($id),'numeric', 'max:999999999999999'],
            'address' => 'required|max:40',
            'age' => 'required|max:6|numeric',
            'email' => 'required|max:50',
            'fatherName' => 'required|max:50',
            'dniFather' => ['required',Rule::unique('students')->ignore($id),'numeric', 'max:999999999999999'],
            'motherName' => 'required|max:50',
            'dniMother' => ['required',Rule::unique('students')->ignore($id),'numeric', 'max:999999999999999'],
            'vaccinationCard' => 'required',
            'memorandumOfAssociation' => 'required',
            'status' => 'required'
        ];
        $niceNames = [
            'fullname' => 'nombre completo',
            'birthDate' => 'campo fecha de nacimiento',
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'lugar de domicilio',
            'age' => 'rango de edad',
            'email' => 'email',
            'fatherName' => 'nombre del padre',
            'dniFather' => 'numero de cedula del padre',
            'motherName' => 'nombre de la madre',
            'dniMother' => 'numero de cedula de la madre',
            'vaccinationCard' => 'carnet de vacunacion',
            'memorandumOfAssociation' => 'acta de nacimiento',
            'status' => 'campo estado'
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($id == $data->id){
            $data->fullname = $request->fullname;
            $data->birthDate = $request->birthDate;
            $data->telephoneNumber = $request->telephoneNumber;
            $data->dni = $request->dni;
            $data->code = rand();
            $data->address = $request->address;
            $data->age = $request->age;
            $data->email = $request->email;
            $data->fatherName = $request->fatherName;
            $data->dniFather = $request->dniFather;
            $data->motherName = $request->motherName;
            $data->dniMother = $request->dniMother;
            $data->vaccinationCard = $request->vaccinationCard;
            $data->memorandumOfAssociation = $request->memorandumOfAssociation;
            $data->status = $request->status;
            $data->save();
            return back()->with('message', 'Estudiante editado con éxito.');
        }

        return back()->with('userErrors', 'El estudiante ya existe.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($id)
    {
        $data = Administration::findOrFail( $id )->delete();
        return redirect("/other/administration")->with( 'message', 'Personal Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTeacher($id)
    {
        $data = Teacher::findOrFail( $id )->delete();
        return redirect("/other/teachers")->with( 'message', 'Profesor Eliminado' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyStudent($id)
    {
        $data = Student::findOrFail( $id )->delete();
        return redirect("/other/students")->with( 'message', 'Estudiante Eliminado' );
    }
}
