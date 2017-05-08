<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\book;
use App\users_info;
use Mail;
use Hash;
use DB;


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
    public function myprofile(){
        if (Auth::user()->data_confirmed==0) {
            return redirect('/myprofile/editprofile');
        }
        $user = Auth::user();
        $user->with('users_info');
        $books = DB::table('books as b')
        ->join('stars as s','b.id', '=','s.book_id')
        ->select('b.*')
        ->where('s.userID',$user->id)
        ->groupBy('b.id')
        ->orderBy('s.created_at','desc')
        ->take(3)
        ->get();
        $booksAutor = DB::table('books as b')
        ->join('stars as s','b.id', '=','s.book_id')
        ->select('b.*')
        ->where('b.user_id',$user->id)
        ->groupBy('b.id')
        ->orderBy(DB::raw('sum(s.star)/count(s.star)'),'desc')
        ->take(1)
        ->get();
        return view('user.myprofile',['busqueda'=>false,'user'=>$user,'books'=>$books,'booksAutor' => $booksAutor]);
    }
    public function myprofile_edit_post(Request $request){
        try{
            $user = Auth::user();
            $user->with('users_info');
            $user->users_info->nombre = $request->input('nombre');
            $user->users_info->apellido = $request->input('Apellido');
            if ($request->hasFile('foto_url')) {
                if ($request->file('foto_url')->isValid()) {
                    $image_name =Auth::user()->username . '-' .$request->file('foto_url')->getClientOriginalName();
                    $path = base_path() . '/storage/UserPhoto/';
                    $request->file('foto_url')->move($path,$image_name);
                    $user->users_info->foto_url = url('/storage/UserPhoto/'.$image_name);
                }
            } 
            $user->user_type =  1;

            if ($request->input('soy_escritor')) {
                $user->users_info->cedula = $request->input('Cedula');
                $user->users_info->nacionalidad = $request->input('nacionalidad');
                $user->users_info->pais_residencia = $request->input('PResidencia');
                $user->users_info->fecha_nac = $request->input('fechaNac');
                $user->users_info->biografia = $request->input('Biografia');
                $user->users_info->telefono = $request->input('Telefono');     
                if ($request->input('Hobbies')) {
                    $user->users_info->mas_info = $request->input('Hobbies');
                }   
                if ($request->input('Telefono2')) {
                    $user->users_info->telefono2 = $request->input('Telefono2');                
                }
                if ($request->input('Celular')) {
                    $user->users_info->celular = $request->input('Celular');                
                }
                if ($request->input('Celular2')) {
                    $user->users_info->celular2 = $request->input('Celular2');                
                }    
                $user->user_type =  2;
            }
                $user->data_confirmed =  1;

            $user->users_info->save();
            $user->save();
            return redirect('/myprofile');
        }
        catch(Exception $ex)
        {            
            return back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
    public function myprofile_edit(){
        $busqueda = false;
        return view('user.profile_edit',compact('busqueda'));
    }
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

    public function registerconfirm(Request $request){
        $user = User::where('confirmation_code',$request->confirmationCode)->first();
        if (!$user) {
            return view('error',['error'=>'Este usuario ya ha sido confirmado']);            
        }else{
            $user->confirmed = 1;
            $user->confirmation_code=null;
            $user->save();
            Auth::login($user);
            if ($user->user_type==4) {
                return redirect('/tarea9');                
            }
            return redirect('/myprofile/editprofile');            
        }
    }
    public function register (Request $request){
        try{
            $confirmation_code = str_random(50);
            $user = new User;
            $user->username = $request->usuario;
            $user->email = $request->correo;
            $user->password = bcrypt($request->contrasenia);
            $user->confirmation_code = $confirmation_code;
            if ($request->type=='4') {
                $user->user_type = 4;
            }
            $user->save();
            Mail::send('email_verify', ['confirmation_code' => $confirmation_code], function ($message) use($user){
                $message->from('EscritoresDominicanosRD@gmail.com', 'Escritores Dominicanos');
                $message->to($user->email, $user->username)->subject('Confirmation Code');
            });
            $users_info = new users_info();
            $users_info->User()->associate($user);
            $users_info->save(); 
            return response()->json(['message' => 'success']);
        
        }        
        catch(Exception $ex)
        {
            $posts[] = array(
                'message' => 'error',
                'error' => $ex->getMessage()
            );

            return response()->json($posts);
        }

    }
    public function login(Request $request){
        $user = User::where('username',$request->usuario)
        ->where('confirmed',1)
        ->first();
        if($user){
            //echo "asdasdasdasda";
            if(Hash::check($request->contrasenia, $user->password)){
                Auth::login($user);
                return response()->json(['message' => 'success']);
            }else{
                return response()->json(['message' => 'contrasenia' ]);
            }            
        }else{
            $user = User::where('email',$request->usuario)
        ->where('confirmed',1)
        ->first();
        if($user){
            //echo "asdasdasdasda";
            if(Hash::check($request->contrasenia, $user->password)){
                Auth::login($user);
                return response()->json(['message' => 'success']);
            }else{
                return response()->json(['message' => 'contrasenia' ]);
            }            
        }
            //echo "joder";
            return response()->json(['message' => 'usuario']);
        }
    }
    
}
