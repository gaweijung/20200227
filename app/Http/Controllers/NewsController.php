<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
class NewsController extends Controller
{
   public function index(){
       $all_news = News::all();
       return view('admin/news/index' , compact('all_news'));
   }

   public function create(){
    return view('admin/news/create');
   }


   public function store(Request $request){
       News::create($request->all());
       return redirect('home/news');
   }

   public function edit($id){
     $news = News::where('id' ,'=' ,$id)->first();
    return view('admin/news/edit', compact('news'));
   }

   public function updata(Request $request , $id){
    // $news = News::find($id);
    // $news->img = $request->img;
    // $news->title = $request->title;
    // $news->content = $request->content;

    // $news->save();

    News::find($id)->update($request->all());
    return redirect('home/news');
   }

   public function delete(Request $request,$id){
    News::find($id)->delete();

    return redirect('home/news');
   }

}
