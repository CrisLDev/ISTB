<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Profile;

class ProfileController extends Controller
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

        $id = auth()->user()->id;

        $userInfo = User::where('id', $id)->first();

        $profileInfo = Profile::where('user_id', $id)->first();

        return view('profile.index', compact('userInfo', 'profileInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Profile();
        $rules = [
            'telephoneNumber' => 'required|unique:profiles|max:10',
            'user_id' => 'required',
            'dni' => 'required|unique:profiles|max:10',
            'address' => 'required|max:50',
        ];
        $niceNames = [
            'telephoneNumber' => 'número de teléfono',
            'user_id' => 'usuario',
            'dni' => 'número de cédula',
            'address' => 'campo dirección',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        $data->user_id = auth()->user()->id;
        $data->telephoneNumber = $request->telephoneNumber;
        $data->dni = $request->dni;
        $data->address = $request->address;
        $data->save();
        return redirect('/profile')->with('message', 'Perfil creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uid = $id;
        $data = Profile::where('id', $id)->first();
        $rules = [
            'telephoneNumber' => 'required|max:10',
            'dni' => 'required|max:10',
            'address' => 'required|max:50',
        ];
        $niceNames = [
            'telephoneNumber' => 'número de teléfono',
            'dni' => 'número de cédula',
            'address' => 'campo dirección',
        ]; 
        if($uid !== $data->id){
            $this->validate($request, $rules, [], $niceNames);
            $data->telephoneNumber = $request->telephoneNumber;
            $data->dni = $request->dni;
            $data->address = $request->address;
            $data->save();
            return redirect('/profile')->with('message', 'Perfil editado correctamente.');  
        }
        return back()->with('userErrors', ' Los datos ya estan en uso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
