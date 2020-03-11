<?php

namespace App\Http\Controllers;
use App\ProductTypes;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index(){
        $items = ProductTypes::all();

        return view('admin/productType/index' , compact('items'));

    }

    public function create(){
        return view('admin/productType/create');
       }

    public function store(Request $request){
        $types = $request->all();
        $product_types = ProductTypes::create($types);
        // $product_types->save();

           return redirect('/home/productType');
    }

    public function edit($id){

        $product = ProductTypes::find($id);

        return view('admin/ProductType/edit', compact('product'));
       }

    public function updata(Request $request , $id){

        ProductTypes::find($id)->update($request->all());

        // dd($request);
        return redirect('admin/productType/index');
       }

    public function delete(Request $request,$id){

        $item = ProductTypes::find($id);
        $item->delete();
        return redirect('admin/productType/index');
       }
}



