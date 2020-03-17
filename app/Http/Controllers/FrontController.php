<?php

namespace App\Http\Controllers;


// use DB;
use App\News;
use App\Contact;
use App\Products;
use App\Mail\sendToUser;
use App\Mail\OrderShipped;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    $news = News::with('news_imgs')->find($id);

    return view('font/news_detail' , compact('news'));
}
public function products(){
    return view('font/products');
}


//與我聯繫
public function contact(){

    return view('font/contact');
}

public function contact_store(Request $request){
    $user_data = $request->all();

    $contact = Contact::create($user_data);

    Mail::to('gaweijung@gmail.com')->send(new OrderShipped($contact));
    return redirect('/contact');
}

//購物車
public function product_detail($product_id){

    $Product = Products::find($productId);

    return view('font/product_detail' , compact('product'));

}

public function add_cart($product_id){

    $productId = $product_id;
    $Product = Products::find($productId); // assuming you have a Product model with id, name, description & price
    $rowId = $productId; // generate a unique() row ID
    $userID  =  Auth::user()->id; // the user ID to bind the cart contents

    // add the product to cart
    \Cart::session($userID)->add(array(
        'id' => $rowId,
        'name' => $Product->title,
        'price' => $Product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $Product
    ));

    return redirect('cart');
}

public function cart_total(){


    $userID = Auth::user()->id;
    $items = \Cart::session($userID)->getContent();
    return view('font/cart' , compact('items'));
}

}
