<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\users_info;


//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function logout(){
        try{
            Auth::logout();
            return response()->json(['message' => 'success']);
        }
        catch(Exception $ex)
        {
            return response()->json(['message' => 'failed']);
        }
        
    }

    public function register (Request $request){
        try{

            $user = new User;
            $user->username = $request->usuario;
            $user->email = $request->correo;
            $user->password = bcrypt($request->contrasenia);
            $user->save();

            $users_info = new users_info();
            $users_info->User()->associate($user);
            $users_info->save();

            if(Auth::attempt(['username' => $request->usuario, 'password' => $request->contrasenia])){

            }else{
                return response()->json(['message' => 'no']);

            }

            /*User::create([
                'username' => $request->usuario,
                'email' => $request->correo,
                'password' => bcrypt($request->contrasenia)
            ]);*/
        
            return response()->json(['message' => 'success']);
        
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $posts[] = array(
                'message' => 'error',
                'error' => $ex->getMessage()
            );

            return response()->json($posts);
        }
    }
    public function login(Request $request){
        if(Auth::attempt(['username' => $request->usuario, 'password' => $request->contrasenia])){
            //echo "asdasdasdasda";
           return response()->json(['message' => 'success']);
        }else{
            //echo "joder";
            return response()->json(['message' => $request->usuario ]);
        }
    }
    
}
