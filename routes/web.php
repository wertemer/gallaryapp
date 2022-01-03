<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','App\Http\Controllers\ControllerArticle@Main');
Route::get('/admin', function () {
    return view('authorization');//welcome');
});
Route::get('/registration',function(){
    return view('registration');
});
Route::get('/admin-panel',function(){
    if(session()->has('login')){
        return view('admin');
    }else{
        return view('authorization');
    }
});
//Users
Route::post('/adduser','App\Http\Controllers\ControllerUsers@AddUser');
Route::post('/logining','App\Http\Controllers\ControllerUsers@Logining');
Route::get('/admin-panel/users-list','App\Http\Controllers\ControllerUsers@UsersList');
Route::get('/logout','App\Http\Controllers\ControllerUsers@LogOut');
//Admin type content
Route::get('/admin-panel/types-list','App\Http\Controllers\ControllerTypes@TypesList');
Route::get('/admin-panel/create-type',function(){
    if(session()->has('login')){
        return view('admin')->with('data',['create-type'=>true]);
    }else{
        return view('authorization');
    }
});
Route::post('/createtypes','App\Http\Controllers\ControllerTypes@Create');
Route::post('/deletetypes','App\Http\Controllers\ControllerTypes@Delete');
Route::get('/admin-panel/change-type/{typeid}/{name}',function($id,$name){
    if(session()->has('login')){
        return view('admin')->with('data',['change-type'=>true,'id'=>$id,'name'=>$name]);
    }else{
        return view('authorization');
    }
});
Route::post('/changetypes','App\Http\Controllers\ControllerTypes@Change');
//Language admin
Route::get('/admin-panel/lang-list','App\Http\Controllers\ControllerLang@List');
Route::get('/admin-panel/create-lang',function(){
    if(session()->has('login')){
        return view('admin')->with('data',['create-lang'=>true]);
    }else{
        return view('authorization');
    }
});
Route::post('/createlang','App\Http\Controllers\ControllerLang@Create');
Route::post('/deletelang','App\Http\Controllers\ControllerLang@Delete');
Route::get('/admin-panel/change-lang/{typeid}/{name}',function($id,$name){
    if(session()->has('login')){
        return view('admin')->with('data',['change-lang'=>true,'id'=>$id,'name'=>$name]);
    }else{
        return view('authorization');
    }
});
Route::post('/changelang','App\Http\Controllers\ControllerLang@Change');
//Genres admin
Route::get('/admin-panel/genre-list','App\Http\Controllers\ControllerGenre@List');
Route::get('/admin-panel/create-genre',function(){
    if(session()->has('login')){
        return view('admin')->with('data',['create-genre'=>true]);
    }else{
        return view('authorization');
    }
});
Route::post('/creategenre','App\Http\Controllers\ControllerGenre@Create');
Route::post('/deletegenre','App\Http\Controllers\ControllerGenre@Delete');
Route::get('/admin-panel/change-genre/{typeid}/{name}',function($id,$name){
    if(session()->has('login')){
        return view('admin')->with('data',['change-genre'=>true,'id'=>$id,'name'=>$name]);
    }else{
        return view('authorization');
    }
});
Route::post('/changegenre','App\Http\Controllers\ControllerGenre@Change');
//Article Admin
Route::get('/admin-panel/content-create',function(){
    if(session()->has('login')){
        return view('admin')->with('data',['content-create'=>true]);
    }else{
        return view('authorization');
    }
});
//Gallary
Route::get('/admin-panel/gallary-list/{type}/{lang}/{genre}','App\Http\Controllers\ControllerArticle@List');
Route::get('/site-panel/gallary-list/{type}/{lang}/{genre}','App\Http\Controllers\ControllerArticle@ListMain');
Route::get('/gallary/{type}/{lang}/{id}','App\Http\Controllers\ControllerArticle@Show');
Route::get('/comix/{type}/{lang}/{id}','App\Http\Controllers\ControllerArticle@Show');
Route::get('/admin-panel/content-create',function(){
    if(session()->has('login')){
        $types=DB::table('types')->get();
        $genre=DB::table('genre')->get();
        $lang=DB::table('lang')->get();
        return view('admin')->with('data',[
            'content-create'=>true,
            'types-cont'=>$types,
            'lang-cont'=>$lang,
            'genres-cont'=>$genre,
            'isnew'=>'1'
        ]);
    }else{
        return view('authorization');
    }
});
Route::post('/createcontent','App\Http\Controllers\ControllerArticle@Add');
Route::get('/admin-panel/delgallary/{id}','App\Http\Controllers\ControllerArticle@Delete');
Route::get('/admin-panel/tochangearticle/{id}','App\Http\Controllers\ControllerArticle@ToChangeArticle');
Route::post('/changearticle','App\Http\Controllers\ControllerArticle@ChangeArticle');
