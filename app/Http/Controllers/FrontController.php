<?php

namespace App\Http\Controllers;


use DB;
// use App\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
 public function index(){
     return view('font/index');
 }

public function news(){
    $news_data = DB::table('news')->orderby('sort' , 'desc')-> get();
    return view('font/news' , compact('news_data'));
}

}
