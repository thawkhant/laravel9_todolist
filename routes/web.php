<?php

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

 
// Route::reditect('URI','URI',301);

// Route::redirect("/","customer/createPage")->name('post#home'); // thu ka poung yae dar // more clean         
Route::get("/",[PostController::class,'create'])->name('post#home');
Route::get("customer/createPage",[PostController::class,"create"])->name("post#createPage");
Route::post("post/create",[PostController::class,"postCreate"])->name("post#create");

  Route::get("post/delete/{id}",[postController::class,"postDelete"])->name('post#delete');
// Route::delete("post/delete/{id}",[postController::class,"postDelete"])->name('post#delete');


  Route::get("post/updatePage/{id}",[PostController::class,'updatePage'])->name("post#updatePage");
  Route::get("post/editPage/{id}",[PostController::class,"editPage"])->name("post#editPage");
  Route::post("post/update",[PostController::class,"update"])->name("post#update");

  // db relation test
  Route::get('product/list',function(){
    $data = Product::select('products.*','categories.name as category_name','categories.description')  // to avoid overwrite
    ->join('categories','products.category_id','categories.id')
    ->get();
    dd($data->toArray());
  });

  Route::get('order/list',function(){
    $data = Order::select('orders.customer_id','orders.product_id','customers.name as customer_name','customers.email','products.name as product_name')
    ->join('customers','orders.customer_id','customers.id')
    ->join('products','orders.product_id','products.id')
    ->get();
    dd($data->toArray());
  });


// Route::get("testing",function(){
// 	return "this is testing";
// })->name("testing");