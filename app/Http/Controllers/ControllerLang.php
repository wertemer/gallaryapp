<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerLang extends Controller
{
    //
    public function List(Request $request){
        if($request->session()->has('login')){
            $lang=DB::table('lang')->get();
            return view('admin')->with('data',['lang'=>$lang]);
        }
        return view('authorization');
    }
    public function Create(Request $request){
        $name=$request->langname;
        $cnt=DB::table('lang')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Язык '.$name.' уже существует');
            return redirect('/admin-panel/create-lang');
        }else{
            DB::table('lang')->insert(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/lang-list');
    }
    public function Delete(Request $request){
        $id=$request->langid;
        DB::table('lang')->where('id','=',$id)->delete();
        return redirect('/admin-panel/lang-list');
    }
    public function Change(Request $request){
        $id=$request->langid;
        $name=$request->newlangname;
        $cnt=DB::table('lang')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Язык '.$name.' уже существует');
            return redirect('/admin-panel/change-lang/'.$id.'/'.$name.'');
        }else{
            DB::table('lang')->where('id',$id)->update(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/lang-list');
    }
}
