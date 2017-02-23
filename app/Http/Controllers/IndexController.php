<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index()
    {
        $busqueda = true;
        return view('IndexHomePage', ['busqueda' => $busqueda]);
    }
    public function test(Request $request)
    {
    	return response()->json([
    		'message'=> $request->message
    		]);
    }
}
