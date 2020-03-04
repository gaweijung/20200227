<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
class NewsController extends Controller
{
   public function index(){
       return view('admin/news/index');
   }
   public function store(Request $request){
       News::create($request->all());
       return redirect('home/news');
   }
}
