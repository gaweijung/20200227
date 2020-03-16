<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $items = Products::all();

        return view('admin/products/index' , compact('items'));

    }

    public function create(){
        return view('admin/products/create');
    }
    public function store(Request $request){
        $types_data = $request->all();
          //上傳檔案
    // $file_name = $request->file('img')->store('','public');
    // $news_data['img'] = $file_name;


        // 暴力上傳
        if($request->hasFile('img')) {

        $file = $request->file('img');
        $path = $this->fileUpload($file,'news');
        $types_data['img'] = $path;
        }

       $types = Products::create($types_data);


        return redirect('/home/products');

    }
    public function edit($id){

        $product = Products::find($id);

        return view('admin/Products/edit', compact('product'));
       }

    public function updata(Request $request , $id){

        Products::find($id)->update($request->all());

        // dd($request);
        return redirect('home/products');
       }

    public function delete(Request $request,$id){

        $item = Products::find($id);

        $item->delete();
        return redirect('home/products');
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
}
