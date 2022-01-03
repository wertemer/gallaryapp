<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerGenre extends Controller
{
    //
    public function List(Request $request){
        if($request->session()->has('login')){
            $genre=DB::table('genre')->orderBy('name','asc')->paginate(15);//->get();
            return view('admin')->with('data',['genre'=>$genre]);
        }
        return view('authorization');
    }
    public function Create(Request $request){
        $name=$request->genrename;
        $cnt=DB::table('genre')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Жанр '.$name.' уже существует');
            return redirect('/admin-panel/create-genre');
        }else{
            DB::table('genre')->insert(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/genre-list');
    }
    public function Delete(Request $request){
        $id=$request->genreid;
        DB::table('genre')->where('id','=',$id)->delete();
        return redirect('/admin-panel/genre-list');
    }
    public function Change(Request $request){
        $id=$request->genreid;
        $name=$request->newgenrename;
        $cnt=DB::table('genre')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Жанр '.$name.' уже существует');
            return redirect('/admin-panel/change-genre/'.$id.'/'.$name.'');
        }else{
            DB::table('genre')->where('id',$id)->update(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/genre-list');
    }
}
