<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
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

        return redirect('/profile');
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
    public function store(Request $request)
    {
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = auth()->user()->id;

        $userInfo = User::where('id', $id)->first();

        return view('user.edit', compact('userInfo'));
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

        $data = User::where('id', $uid)->first();

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->password != $request->password_confirmation){
            return redirect('/user/me')->with('userErrors', '¡Las contraseñas no son iguales!');
        }
        if($request->password){
            $data->password = $password = bcrypt($request->password);
        }

        $data->save();

        return back()->with('message', 'Información editada con éxito.');
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

    /**
     * Display the logged user information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateme(Requests $request, $id)
    {
        $id = auth()->user()->id;

        $data = User::where('id', $id)->first();

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->password != $request->password_confirmation){
            return redirect('/user/me')->with('userErrors', '¡Las contraseñas no son iguales!');
        }
        if($request->password){
            $data->password = $password = bcrypt($request->password);
        }

        $data->save();

        return back()->with('message', 'Información editada con éxito.');
    }

    /**
     * Display the logged user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $id = auth()->user()->id;

        $user = User::where('id', $id)->first();

        return view('user.me', compact('user'));
    }
}
