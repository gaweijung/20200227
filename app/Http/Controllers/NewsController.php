<?php

namespace App\Http\Controllers;

use App\News;

use App\NewsImgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
       $news_data = $request->all();

//   上傳檔案
    // $file_name = $request->file('img')->store('','public');
    // $news_data['img'] = $file_name;


// 暴力上傳
if($request->hasFile('img')) {

    $file = $request->file('img');
    $path = $this->fileUpload($file,'news');
    $news_data['img'] = $path;
}

    //    News::create($request->all());
       $new_news = News::create($news_data);

       //多個檔案

if($request->hasFile('news_imgs'))
{
    $files = $request->file('news_imgs');
    foreach ($files as $file) {
        $path = $this->fileUpload($file,'news');
        $news_imgs = new NewsImgs;
        $news_imgs->news_id =  $new_news->id;
        $news_imgs->news_img = $path;
        $news_imgs->save();
    }
}
        return redirect('home/news');
   }

   public function edit($id){

    $news = News::with('news_imgs')->find($id);

    return view('admin/news/edit', compact('news'));
   }

   public function updata(Request $request , $id){

// News::find($id)->update($request->all());


        //   黃致融刪除寫法
        // $item = News::find($id);
        // $old_img = $item->img;
        // $news_data = $request ->all();
        // if ($request->hasFile('img')) {
        //     Storage::disk('public')->delete($old_img);
        //     $file_name = $request->file('img')->store('','public');
        //     $news_data['img']=$file_name;
        // }
        // else {
        //     $news_data['img'] = $old_img;
        // }
        // News::find($id) ->update($news_data);
        // return redirect('home/news');



    $request_data = $request->all();
    $items = News::find($id);
    
    if($request->hasFile('img')){
        // 刪除舊圖片
        $old_image = $items->img;
        File::delete(public_path().'/storage'.$old_image);

        // 上傳新圖片
        $file = $request->file('img');
        $path = $this->fileUpload($file,'news');
        $request_data['img'] = $path;
    }
    $items -> update($request_data);


    return redirect('home/news');
   }

   public function delete(Request $request,$id){

    $item = News::find($id);
     //單一圖片的刪除
     $old_image = $item->img;
     if(file_exists(public_path().'/storage'.$old_image))

     {
         File::delete(public_path().'/storage'.$old_image);
     }
     $item->delete();

    // 多圖片刪除
    $news_imgs = NewsImgs::where('news_id' , $id)->get();
    foreach($news_imgs as $news_img){
        $old_image = $news_img->img;
        if(file_exists(public_path().'/storage'.$old_image))

     {
         File::delete(public_path().'/storage'.$old_image);
     }
         $news_img->delete();
        }


    return redirect('home/news');
   }

   private function fileUpload($file,$dir){
    //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
    if( ! is_dir('upload/')){
        mkdir('upload/');
    }
    //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
    if ( ! is_dir('upload/'.$dir)) {
        mkdir('upload/'.$dir);
    }
    //取得檔案的副檔名
    $extension = $file->getClientOriginalExtension();
    //檔案名稱會被重新命名
    $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
    //移動到指定路徑
    // move_uploaded_file($file, public_path().'/storage/'.'/upload/'.$dir.'/'.$filename);
    move_uploaded_file($file, public_path('/upload/'.$dir.'/'.$filename));
    //回傳 資料庫儲存用的路徑格式
    return '/upload/'.$dir.'/'.$filename;
    }

    public function ajax_delete_news_img(Request $request){
        $newsimgid = $request->newsimgid;

        $item = NewsImgs::find($newsimgid);
        $old_image = $item->news_img;
     if(file_exists(public_path().'/storage'.$old_image))

     {
         File::delete(public_path().'/storage'.$old_image);
     }
     $item->delete();
        return $newsimgid;
    }


    public function ajax_post_sort(Request $request)
    {
    $news_img_id = $request->news_id;

    $sort = $request->sort_value;

    $news_img = NewsImgs::find($news_img_id);

    $news_img->sort = $sort;

    $news_img->save();
    }
}
