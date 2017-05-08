<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Img;

class TareasController extends Controller
{
	public function tarea9_index(){
		return view('tareas.tarea9.tarea9_home');
	}
	public function tarea8_index(){
		$images = Img::paginate(20);
		return view('tareas.tarea8.index',compact('images'));
	}
	public function tarea8_post(Request $request){
		$image_name = $request->file('image')->getClientOriginalName();
		$path = base_path() . '/public/img/tarea8/';
	    $request->file('image')->move($path,$image_name);
	    $img = new Img;
	    $img->src = $image_name;
	    $img->name = $request->input('img_name');
	    $img->description = $request->input('img_descripcion');
	    $img->save();
	    //var_dump();
	    return back();
	}
	public function tarea8_postborrar(Request $request){
		Img::where('id',$request->input('id'))->delete();
		return back();
	}
}