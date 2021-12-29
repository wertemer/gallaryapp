<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ControllerUsers extends Controller
{
    // add user (registration)
    public function AddUser(Request $request){
        //валидация
        $validate=$request->validate([
            'login'=>'required|unique:users,name',
            'email'=>'required|email|required_with:email-at|same:email-at',
            'email-at'=>'required|email',
            'password'=>'required|min:8|alpha_dash|required_with:password-at|same:password-at',
            'password-at'=>'required|min:8|alpha_dash',
            'remember'=>'required|max:100'
        ]); 
        //создаем пользователя
        $user=new User;
        $user->name=$request->login;
        $user->email=$request->email;
        $user->email_verified_at=Carbon::now()->format('Y-m-d H:i:s');
        $user->password=$request->password;
        $user->remember_token=$request->remember;
        $user->created_at=Carbon::now()->format('Y-m-d H:i:s');//now()->timestamp;
        $user->updated_at=Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        return view('authorization');
    }
    public function Logining(Request $request){
        $validate=$request->validate([
            'login'=>'required',
            'password'=>'required'
        ]);
        $user=DB::table('users')->where('name','=',$request->login)->first();
        $cnt=DB::table('users')->where('name','=',$request->login)->count();
        if($cnt===0){         
            $request->session()->flash('');   
            $request->session()->flash('alert-danger', 'Пользователя с данным логином не существует!');
        } else {
            if($user->password!==$request->password){
                $request->session()->flash('');
                $request->session()->flash('alert-danger', 'Неверный пароль!');
            }else{
                $request->session()->put('login',$user->name);
                //return view('admin')->with('data',[]);
                return redirect('/');
            }
        }
        return view('authorization');
    }
    public function LogOut(Request $request){
        if($request->session()->has('login')){
            $request->session()->forget('login');
        }
        //return view('main')->with('data',[]);
        return redirect('/');
    }
    public function UsersList(Request $request){
        if($request->session()->has('login')){
            $users=DB::table('users')->select('name','email','created_at','updated_at')->get();
            return view('admin')->with('data',['users'=>$users]);
        }
        return view('authorization');
    }
}
