<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use Mail;
use App\User;
use DB;

class IndexController extends Controller
{
    public function test2(){
        return view('test2');
    }
    public function test2Post(Request $request){
        $data = $request->data;
        foreach ($data as $data1) {
            $message =  $data1['primero'] . ' ' . $data1['segundo'];
        }
        //$array[] = array('primero' => '1','segundo' => '2');
        /*foreach ($array as $key) {
            $message = $key->primero;
        }*/

        /*
            try{
                foreach ($data as $datas) {
                    try{
                        $insert =  $data;
                    }catch(error){
                        error.push(error,value not inserted);
                    }
                    
                }
        }       return with not inserted values info
            }catch(error){
                return error
            }
        */
            

       return response()->json(['message' => $message]);
    }
    public function bookDetail(Request $request){
        $busqueda = false;
        $query = book::with('tag','book_locations');
        $query->where('id',$request->bookID);
        $book = $query->first();

        $star = DB::table('stars')->where('book_id',$book->id)->get();

        if(isset($star)){
            $sumStar = 0;            
            $countStar = 0;            
            foreach ($star as $starr) {
                $sumStar += $starr->star;
                $countStar +=1;
            }
            if ($countStar == 0) {
                $stars = 0;
            }else{
                $stars = $sumStar / $countStar;
            }
        }
        //echo $book->star->sum('star');
        return view('BookDetail', ['busqueda' => $busqueda,'book' => $book,'stars' => $stars]);
    }
    public function Index()
    {
        $busqueda = true;
        return view('IndexHomePage', ['busqueda' => $busqueda]);
    }
    public function test()
    {
       /* $confirmation_code = str_random(50);
        $user = User::where('id','14')->first();
    	Mail::send('email_verify', ['confirmation_code' => $confirmation_code], function ($message) use($user){
                $message->from('EscritoresDominicanosRD@gmail.com', 'Escritores Dominicanos');
                $message->to($user->email, $user->username)->subject('Confirmation Code');
            });*/
            return view('test');
    }
    public function testPost(Request $request){
            $confirmation_code = str_random(50);
            $user = new User;
            $user->username = $request->input('val1');
            $user->email = $request->input('val2');
            $user->password = bcrypt($request->input('val3'));
            $user->confirmation_code = $confirmation_code;
            $user->save();

           /* Mail::send('email_verify', $confirmation_code, function($message) {
            $message->to($request->correo, $request->usuario)
                ->subject('Verifica tu correo electronico');
            });*/

            Mail::send('email_verify', ['confirmation_code' => $confirmation_code], function ($message) use($user){
                $message->from('EscritoresDominicanosRD@gmail.com', 'Escritores Dominicanos');
                $message->to($user->email, $user->username)->subject('Confirmation Code');
            });
    }
    public function findBooksCategoria($categoria){
        $busqueda = false;
        $books = book::with('tag')->whereHas('tag', function($query) use($categoria){
            $query->where('name',$categoria);
        })->simplePaginate(12);
        return view('Busqueda', ['busqueda' => $busqueda, 'books' => $books]);
    }
    public function allCategories(){
        return false;
    }
    public function findBooks(Request $request){
        $busqueda = false;
        if($request->input('tipodebusqueda') == 'avanzada'){
            $query = book::with('tag');
            if($request->input('isbn')!=null)
                $query->where('id','like','%'.$request->input('isbn').'%');
            if($request->input('title')!=null)
                $query->Where('title','like','%'.$request->input('title').'%');
            if($request->input('autor')!=null)
                $query->Where('autor','like','%'.$request->input('autor').'%');
            if($request->input('tags-search')!=null){
                $tags = $request->input('tags-search');
                foreach ($tags as $tag) {
                    $query->whereHas('tag', function($queryInside) use($tag){
                        $queryInside->Where('name','=', $tag);
                    });  
                }                     
            }
            if($request->input('editora')!=null)
                $query->Where('editora','like','%'.$request->input('editora').'%');
            if($request->input('noedicion')!=null)
                $query->Where('numero_edicion',$request->input('noedicion'));
            if($request->input('dateeditionfrom')!=null && $request->input('dateeditionto')!=null)
                $query->whereBetween('edicion_date',array($request->input('dateeditionfrom'),$request->input('dateeditionto')));
            if($request->input('preciodesde')!=null && $request->input('preciohasta')!=null)
                $query->whereBetween('precio',array($request->input('preciodesde'),$request->input('preciohasta')));
            if ($request->input('organizarpor')!='null'){
                switch ($request->input('organizarpor')) {
                    case 'preciobajo':
                        $query->orderBy('precio','asc');                        
                        break;
                    case 'precioalto':
                        $query->orderBy('precio','desc');                        
                        break;
                    case 'autoraz':
                        $query->orderBy('autor','asc');                        
                        break;
                    case 'autorza':
                        $query->orderBy('autor','desc');                        
                        break;
                    case 'tituloaz':
                        $query->orderBy('title','asc');                        
                        break;
                    case 'tituloza':
                        $query->orderBy('title','desc');                        
                        break;
                    case 'recientes':                  
                        break;
                    default:
                        break;
                }
            }
            $books = $query->simplePaginate(12);
        }else{
            $books = book::with('tag')
            ->where('title', 'like', '%'.$request->input('input_home_search').'%')
            ->simplePaginate(12);
        }
        return view('Busqueda', ['busqueda' => $busqueda, 'books' => $books]);
    }
}
