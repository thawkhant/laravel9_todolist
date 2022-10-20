<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // customer create page
    public function create(){
        return view('create');
    }


    // post create
    public function postCreate(Request $request){
       // dd($request->all());

        // $data = [
        //  'title' => $request->postTitle,
        //  'description' => $request->postDescription
        // ];

       $data = $this->getPostData($request);   // private function ko pyan call nay dar
       Post::create($data);  // database ko htal dr
       // return view('create');   // thu ye page ko pyan yout aung  // ma tu nyi det pages dwe ko twar dr
       //  return back();  // de har ka A page to => A page ko bal ya dal
      // return redirect('testing'); // url ka yu dar
      // return redirect()->route('testing');  // route ka yu dar  by name
       return redirect()->route('post#createPage');  // she dar

         // dd($data);


    }


    // get post data private function // equal with upper once sir

    private function getPostData($request){
  // dd("this is private function call test");
        $respond = [
         'title' => $request->postTitle,
         'description' => $request->postDescription
        ];
       
       return $respond;     // private function ka return pyan pay ya dal

    }
}
