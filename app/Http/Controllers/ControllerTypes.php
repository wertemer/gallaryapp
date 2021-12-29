<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTypes extends Controller
{
    //
    public function TypesList(Request $request){
        if($request->session()->has('login')){
            $types=DB::table('types')->get();
            return view('admin')->with('data',['types'=>$types]);
        }
        return view('authorization');
    }
    public function Create(Request $request){
        $name=$request->typename;
        $cnt=DB::table('types')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Тип контента '.$name.' уже существует');
            return redirect('/admin-panel/create-type');
        }else{
            DB::table('types')->insert(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/types-list');
    }
    public function Delete(Request $request){
        $id=$request->typeid;
        DB::table('types')->where('id','=',$id)->delete();
        return redirect('/admin-panel/types-list');
    }
    public function Change(Request $request){
        $id=$request->typeid;
        $name=$request->newtypename;
        $cnt=DB::table('types')->select('name')->where('name',$name)->count();
        if($cnt>0){
            //message
            $request->session()->flash('alert-danger','Тип контента '.$name.' уже существует');
            return redirect('/admin-panel/change-type/'.$id.'/'.$name.'');
        }else{
            DB::table('types')->where('id',$id)->update(
                array('name'=>$name)
            );
        }
        return redirect('/admin-panel/types-list');
    }
}
