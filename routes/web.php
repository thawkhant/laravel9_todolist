<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get("/",[PostController::class,'create'])->name('post#home');
Route::get("customer/createPage",[PostController::class,"create"])->name("post#createPage");
Route::post("post/create",[PostController::class,"postCreate"])->name("post#create");

  Route::get("post/delete/{id}",[postController::class,"postDelete"])->name('post#delete');
// Route::delete("post/delete/{id}",[postController::class,"postDelete"])->name('post#delete');


  Route::get("post/updatePage/{id}",[PostController::class,'updatePage'])->name("post#updatePage");
  Route::get("post/editPage/{id}",[PostController::class,"editPage"])->name("post#editPage");
  Route::post("post/update",[PostController::class,"update"])->name("post#update");


// Route::get("testing",function(){
// 	return "this is testing";
// })->name("testing");