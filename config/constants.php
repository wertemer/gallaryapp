<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*use Illuminate\Support\Facades\DB;
$tags=DB::table('types')->get();
$array=Array();
foreach($tags as $tag){
    $array[$tag->name]=$tag->id;
}*/
return [
    'All'=>0,
    'Gallary'=>1,
    'Stories'=>2,
    'Comix'=>3,
    'Russian'=>1,
    'Группа'=>1,
    'Path_Gallary'=>'/public/gallary/',
    'Path_Gallary_RU'=>'/public/comix/ru/'
];

