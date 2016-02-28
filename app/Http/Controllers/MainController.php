<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Page;
class MainController extends Controller
{
    function index()
    {
        return view('main');
    }
    function test()
    {
        //var_dump(Page::all());
        
        foreach (Page::all() as $k=>$v) {
        echo $v->tag->name.'</br>';
        }
    }
}
