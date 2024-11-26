<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    function nameFunc(){
        return "Hello, I am the first route";
    }
    function Jsonfunc(){
        return response()->json(['first-name'=>"charbel",'last-name'=>"khadra"]);
    }
    function parFunc($id){
        return "this is the value of the parameter:" .$id;
    }

}
