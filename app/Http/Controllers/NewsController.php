<?php

namespace App\Http\Controllers;

use App\News;

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
    $file_name = $request->file('img')->store('','public');


    $news_data['img'] = $file_name;


// if($request->hasFile('img')) {
//     $file = $request->file('img');
//     $path = $this->fileUpload($file,'news');
//     $news_data['img'] = $path;
// }

    //    News::create($request->all());
       News::create($news_data);
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


// News::find($id)->update($request->all());

        $item = News::find($id);
        $old_img = $item->img;
        //  dd($old_img);
        $news_data = $request ->all();

        if ($request->hasFile('img')) {

            Storage::disk('public')->delete($old_img);

            $file_name = $request->file('img')->store('','public');
            $news_data['img']=$file_name;
        }
        else {
            $news_data['img'] = $old_img;
        }

        News::find($id) ->update($news_data);

        return redirect('home/news');

    // $request_data = $request->all();
    // $items = News::find($id);
    // if($request->hasFile('img')){

    //     $old_image = $item->img;
    //     File::delete(public_path().$old_image);

    //     $file = $request->file('img');
    //     $path = $this->fileUpload($file,'news');
    //     $request_data['img'] = $path;
    // }
    // $items -> update($request_data);


    // return redirect('home/news');
   }

   public function delete(Request $request,$id){
    News::find($id)->delete();

    return redirect('home/news');
   }

}
// private function fileUpload($file,$dir){
//     //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
//     if( ! is_dir('upload/')){
//         mkdir('upload/');
//     }
//     //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
//     if ( ! is_dir('upload/'.$dir)) {
//         mkdir('upload/'.$dir);
//     }
//     //取得檔案的副檔名
//     $extension = $file->getClientOriginalExtension();
//     //檔案名稱會被重新命名
//     $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
//     //移動到指定路徑
//     move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
//     //回傳 資料庫儲存用的路徑格式
//     return '/upload/'.$dir.'/'.$filename;
// }

