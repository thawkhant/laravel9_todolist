<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get("/",[PostController::class,'create'])->name('post#home');
Route::get("customer/createPage",[PostController::class,"create"])->name("post#createPage");
Route::post("post/create",[PostController::class,"postCreate"])->name("post#create");


// Route::get("testing",function(){
// 	return "this is testing";
// })->name("testing");