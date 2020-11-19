<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Creativeorange\Gravatar\Facades\Gravatar;

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
        $users = User::get();
        return view('user.all', compact('users'));
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

        $user = User::where('id', $id)->first();

        return view('user.edit', compact('user'));
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
        $rules = [
            'name' => 'required|max:50|min:5',
            'role' => 'required|max:6',
            'username' => 'required|max:50|min:5',
            'email' => 'required|min:10|max:50',
            'password' => 'max:20',
        ];
        $niceNames = [
            'name' => 'nombre',
            'role' => 'usuario',
            'username' => 'nombre de usuario',
            'email' => 'email',
            'password' => 'campo contraseña',
        ]; 
        $this->validate($request, $rules, [], $niceNames);
        if($uid == $data->id){
            $data->name = $request->name;
            $data->role = $request->role;
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

        return back()->with( 'messageError', 'El nombre ya ha sido tomado' );
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail( $id )->delete();
        return back()->with( 'message', 'Usuario Eliminado' );
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
        $data->role = $request->role;
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
