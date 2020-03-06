<?php

namespace App\Http\Controllers;


// use DB;
use App\News;
use Illuminate\Http\Request;


class FrontController extends Controller
{
 public function index(){
     return view('font/index');
 }

public function news(){
    $news_data = News::orderBy('sort' , 'desc')-> get();
    return view('font/news' , compact('news_data'));
}

public function news_detail($id){
    $item = News::find($id);

    return view('font/news_detail');
}


}
