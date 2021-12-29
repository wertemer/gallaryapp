<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ControllerArticle extends Controller {

    //
    public function List(Request $request) {
        $type = $request->type;
        $lang = $request->lang;
        $genre = $request->genre;
        $files = Array();
        if ($request->session()->has('login')) {
            if ($genre != 0) {
                $articles = DB::table('article')
                        ->leftJoin('types', 'types.id', '=', 'article.type_id')
                        ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
                        ->leftJoin('articlegenre', 'articlegenre.article_id', '=', 'article.id')
                        ->where('article.type_id', $type)
                        ->where('article.lang_id', $lang)
                        ->where('articlegenre.genre_id', $genre)
                        ->select(
                                'article.id as id',
                                'article.name as name',
                                'article.desc as desc',
                                'article.ttext as text',
                                'types.name as type_name',
                                'article.updated_at as updated',
                                'article.type_id as type_id',
                                'article.lang_id as lang_id'
                        )->distinct()
                        ->get();
                if ($type == config('constants.Gallary')) {
                    foreach ($articles as $article) {
                        $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $article->name . ''));
                    }
                }
                if ($type == config('constants.Comix') && $lang == config('constants.Russian')) {
                    foreach ($articles as $article) {
                        $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary_RU') . '' . $article->name . ''));
                    }
                }
            } else {
                $articles = DB::table('article')
                        ->leftJoin('types', 'types.id', '=', 'article.type_id')
                        ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
                        ->where('article.type_id', $type)
                        ->where('article.lang_id', $lang)
                        ->select(
                                'article.id as id',
                                'article.name as name',
                                'article.desc as desc',
                                'article.ttext as text',
                                'types.name as type_name',
                                'article.updated_at as updated',
                                'article.type_id as type_id',
                                'article.lang_id as lang_id'
                        )
                        ->get();
                if ($type == config('constants.Gallary')) {
                    foreach ($articles as $article) {
                        $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $article->name . ''));
                    }
                }
                if ($type == config('constants.Comix') && $lang == config('constants.Russian')) {
                    foreach ($articles as $article) {
                        $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary_RU') . '' . $article->name . ''));
                    }
                }
            }
            $tags = DB::table('article')
                    ->leftJoin('types', 'types.id', '=', 'article.type_id')
                    ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
                    ->leftJoin('articlegenre', 'articlegenre.article_id', '=', 'article.id')
                    ->leftJoin('genre', 'genre.id', '=', 'articlegenre.genre_id')
                    ->where('article.type_id', $type)
                    ->where('article.lang_id', $lang)
                    ->select(
                            'articlegenre.article_id as id',
                            'articlegenre.genre_id as genre_id',
                            'genre.name as genre_name'
                    )->distinct()
                    ->get();
            $tg = DB::table('genre')->get();
            return view('admin')->with('data', [
                        'articles' => $articles,
                        'tags' => $tags,
                        'tag_list' => $tg,
                        'type_id' => $type,
                        'lang_id' => $lang,
                        'files' => $files
            ]);
        }
        return view('main');
    }
    
    public function ListMain(Request $request){
        $type = $request->type;
        $lang = $request->lang;
        $genre = $request->genre;
        $files = Array();
        if ($genre != 0) {
            $articles = DB::table('article')
                ->leftJoin('types', 'types.id', '=', 'article.type_id')
                ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
                ->leftJoin('articlegenre', 'articlegenre.article_id', '=', 'article.id')
                ->where('article.type_id', $type)
                ->where('article.lang_id', $lang)
                ->where('articlegenre.genre_id', $genre)
                ->select(
                    'article.id as id',
                    'article.name as name',
                    'article.desc as desc',
                    'article.ttext as text',
                    'types.name as type_name',
                    'article.updated_at as updated',
                    'article.type_id as type_id',
                    'article.lang_id as lang_id'
                )->distinct()
                ->get();
            if ($type == config('constants.Gallary')) {
                foreach ($articles as $article) {
                    $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $article->name . ''));
                }
            }
            if ($type == config('constants.Comix') && $lang == config('constants.Russian')) {
                foreach ($articles as $article) {
                    $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary_RU') . '' . $article->name . ''));
                }
            }
        } else {
            $articles = DB::table('article')
                ->leftJoin('types', 'types.id', '=', 'article.type_id')
                ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
                ->where('article.type_id', $type)
                ->where('article.lang_id', $lang)
                ->select(
                    'article.id as id',
                    'article.name as name',
                    'article.desc as desc',
                    'article.ttext as text',
                    'types.name as type_name',
                    'article.updated_at as updated',
                    'article.type_id as type_id',
                    'article.lang_id as lang_id'
                )
                ->get();
            if ($type == config('constants.Gallary')) {
                foreach ($articles as $article) {
                    $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $article->name . ''));
                }
            }
            if ($type == config('constants.Comix') && $lang == config('constants.Russian')) {
                foreach ($articles as $article) {
                    $files[$article->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary_RU') . '' . $article->name . ''));
                }
            }
        }
        $tags = DB::table('article')
            ->leftJoin('types', 'types.id', '=', 'article.type_id')
            ->leftJoin('lang', 'lang.id', '=', 'article.lang_id')
            ->leftJoin('articlegenre', 'articlegenre.article_id', '=', 'article.id')
            ->leftJoin('genre', 'genre.id', '=', 'articlegenre.genre_id')
            ->where('article.type_id', $type)
            ->where('article.lang_id', $lang)
            ->select(
                'articlegenre.article_id as id',
                'articlegenre.genre_id as genre_id',
                'genre.name as genre_name'
            )->distinct()
            ->get();
        $tg = DB::table('genre')->get();
        return view('main')->with('data', [
            'articles' => $articles,
            'tags' => $tags,
            'tag_list' => $tg,
            'type_id' => $type,
            'lang_id' => $lang,
            'files' => $files
        ]);
    }

    public function Add(Request $request) {
        if ($request->session()->has('login')) {
            //если галерея сохраняем файлы
            if ($request->gallary == config('constants.Gallary')) {
                Storage::makeDirectory(config('constants.Path_Gallary') . '' . $request->name);
                $path = str_replace('', '-', $request->name);
                foreach ($request->path as $file) {
                    //cохраняем файл,имя файла генерируется
                    //Storage::put(config('constants.Path_Gallary').''.$request->name.'/',$file);
                    //cохраняем файл,имя файла задаем
                    Storage::putFileAs(config('constants.Path_Gallary') . '' . $request->name . '/', $file, $file->getClientOriginalName());
                }
            } else if ($request->gallary == config('constants.Comix')) {
                if ($request->lang == config('constants.Russian')) {
                    Storage::makeDirectory(config('constants.Path_Gallary_RU') . '' . $request->name);
                    $path = str_replace('', '-', $request->name);
                    foreach ($request->path as $file) {
                        //cохраняем файл,имя файла генерируется
                        //Storage::put(config('constants.Path_Gallary').''.$request->name.'/',$file);
                        //cохраняем файл,имя файла задаем
                        Storage::putFileAs(config('constants.Path_Gallary_RU') . '' . $request->name . '/', $file, $file->getClientOriginalName());
                    }
                }
            } else {
                $path = $request->name;
            }
            $id = DB::table('article')->insertgetid([
                'name' => $request->name,
                'desc' => $request->desc,
                'path' => $path,
                'ttext' => $request->text,
                'lang_id' => $request->lang,
                'type_id' => $request->gallary,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            if (isset($id)) {
                DB::table('articlegenre')->where('article_id', $id)->delete();
                foreach ($request->tgs as $tag) {
                    DB::table('articlegenre')->insert([
                        'article_id' => $id,
                        'genre_id' => $tag
                    ]);
                }
            }
            return view('admin')->with('data', []);
        }
        return view('authorization');
    }

    public function Show(Request $request) {
        $type = $request->type;
        $lang = $request->lang;
        $id = $request->id;
        $files = Array();
        $gallary = DB::table('article')->where('id', $id)->get();
        $tags=DB::table('articlegenre')
            ->leftJoin('genre','genre.id','=','articlegenre.genre_id')
            ->where('article_id',$id)
            ->get();
        if ($type == config('constants.Gallary')) {            
            foreach ($gallary as $gal) {
                $files[] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $gal->name . ''));
            }
            $tg = DB::table('genre')->get();
            if ($request->session()->has('login')) {
                return view('admin')->with('data', [
                            'gallary-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'files' => $files,
                            'tags'=>$tags
                ]);
            }else{
                return view('main')->with('data', [
                            'gallary-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'files' => $files,
                            'tags'=>$tags
                ]);
            }
        }
        if($type==config('constants.Comix') && $lang==config('constants.Russian')){
            foreach($gallary as $gal){
                $files[]=str_replace('public/','./',Storage::files(config('constants.Path_Gallary_RU').''.$gal->name.''));
            }
            $tg = DB::table('genre')->get();
            if ($request->session()->has('login')) {
                return view('admin')->with('data', [
                            'comix-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'files' => $files,
                            'tags'=>$tags
                ]);
            }else{
                return view('main')->with('data', [
                            'comix-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'files' => $files,
                            'tags'=>$tags
                ]);
            }
        }
        if($type==config('constants.Stories')&& $lang==config('constants.Russian')){
            $tg = DB::table('genre')->get();
            if ($request->session()->has('login')) {
                return view('admin')->with('data', [
                            'article-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'files' => $files,
                            'tags'=>$tags
                ]);
            }else{
                return view('main')->with('data', [
                            'article-show' => $gallary,
                            'type_id' => $type,
                            'lang_id' => $lang,
                            'tag_list' => $tg,
                            'tags'=>$tags
                ]);
            }
        }
        return view('authorization');
    }

    public function Main(Request $request){
        $tags=DB::table('genre')->get();
        $articles=DB::table('article')
            ->where('type_id',config('constants.Stories'))
            ->orderby('updated_at','desc')
            ->limit(5)->get();
        $gallary=DB::table('article')
            ->where('type_id',config('constants.Gallary'))
            ->orderby('updated_at','desc')
            ->limit(8)->get();
        $comix=DB::table('article')
            ->where('type_id',config('constants.Comix'))
            ->orderby('updated_at','desc')
            ->limit(8)->get();
        foreach ($gallary as $gal) {
            $files[$gal->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary') . '' . $gal->name . ''));
        }
        foreach ($comix as $cmx) {
            $files[$cmx->id] = str_replace('public/', './', Storage::files(config('constants.Path_Gallary_RU') . '' . $cmx->name . ''));
        }
        $tags = DB::table('genre')
                    ->leftJoin('articlegenre', 'articlegenre.genre_id', '=', 'genre.id')
                    ->select(
                            'articlegenre.article_id as id',
                            'articlegenre.genre_id as genre_id',
                            'genre.name as genre_name'
                    )->distinct()
                    ->get();
        if ($request->session()->has('login')) {
            return view('admin')->with('data',[
                'articles_main'=>$articles,
                'gallary_main'=>$gallary,
                'comix_main'=>$comix,
                'tags'=>$tags,
                'files'=>$files
            ]);
        } else {
            return view('main')->with('data',[
                'articles_main'=>$articles,
                'gallary_main'=>$gallary,
                'comix_main'=>$comix,
                'tags'=>$tags,
                'files'=>$files
            ]);
        }
    }
}
