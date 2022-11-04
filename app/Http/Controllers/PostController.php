<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // customer create page
    public function create(){
        // database htal ka data yu dr

       //$posts = Post::orderBy('created_at','desc')->get()->toArray();  // === Select * From blahh blahh...




//         $posts = Post::orderBy('created_at','desc')->paginate(3);  // paginate loke dr sir
           // $posts = Post::where("id","<","6")->where('address','=','myeik')->get();
           // $posts = Post::get();
           //  $posts = Post::first();
           //   $posts = Post::get()->last();
           // $posts = Post::pluck('title');
           //$posts = Post::select("title","price")->get();
           // $posts = Post::where("id","<","6")->pluck("title",'address');
          // $posts = Post::get()->random();
        // $posts = Post::where("id","<","10")->get()->random();     // all === get // all ma ya yin get thone
        //  $posts = Post::where("id","<",20)->where("address","=","Myeik")->get();  // where = &&  // orWhere ||
         // $posts = Post::orWhere("id","<",20)->orWhere("address","=","Myeik")->get();
         //  $posts = Post::orderBy('id','asc')->get();
        // $posts = Post::orderBy('price','desc')->get();
       // $posts = Post::whereBetween("price",[3000,5000])->get();
//        $posts = Post::select('id','address','price')->where('address','yangon')->whereBetween("price",[3000,5000])->orderBy("price","asc")->dd();

       // $posts = Post::select('id','address','price')->where('address','yangon')->whereBetween("price",[3000,5000])->orderBy("price","asc")->get();
            // $posts = Post::where('address','yangon')->orderBy("price",'asc')->value("title"); // select net yae dar po kaung dl

        // $posts = Post::find(3);  // id ko yu lite dr // a pow mar si dal where net yu dar
        // $posts = Post::max("price");
        // $posts = Post::min("price");
       // $posts = Post::average("price");
       // $posts = Post::where('address','myeik')->exists();
       // $posts = Post::select("id",'title as post_title','title as post_b_title')->get();
        $posts = Post::select('rating',DB::raw('COUNT(rating) as rating_count'),DB::raw('SUM(price) as total_price'))->groupBy('rating')->get();
        dd($posts->toArray());


        // dd($posts);
        // dd($posts[0]['title']);
        // dd($posts->toArray());
        return view('create',compact('posts'));  // a shay mar compact ko lat lar p b
    }


    // post create
    public function postCreate(Request $request){

//       Validator::make($request->all(),[     // Validation section pr sir
//        'postTitle' => 'required|min:5|max:10|unique:posts,title',  // posts ka database name / post table mar unique pyint ya mal lot pyaw dar  // table name htal ka coloumn name
//        'postDescription' => 'required|min:5'
//       ])->validate();   // import lal loke pay ya oak mal

         $this->postValidationCheck($request);  // private function net twar write dar



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
       return redirect()->route('post#createPage')->with(['insertSuccess'=>'ဂုဏ်ယူပါတယ်။ ပို့စ်ကို အောင်မြင်စွာ ဖန်တီးပြီးပါပြီ']);  // she dar    // with net ka temporary section ko use lite dar

         // dd($data);


    }

    //post delete

    public function postDelete($id){
        // dd($id);

        // first way
       // Post::where("id",$id)->delete();   // front ka mysql query back ka variable
       // return redirect()->route("post#createPage");
       // return back(); // apow ka 2 gyoung ko pyan call dar bl

        // second way

        $post = Post::find($id)->delete();
        return back();


    }


    // direct update page

    public function updatePage($id){

       // dd($id);
//        $post = POST::where("id",$id)->get()->toArray();
        $post = POST::where("id",$id)->get(); //array ko pyoke dl cuzz arrary net so ma ya lot
       // dd($post);
       // dd($post); array format gyi
       // $post = POST::first()->toArray();
        // $post = POST::where('id',$id)->first()->toArray();   // d lo yae mal so yin 0 kan dwe pyoke yone bl
       // dd($post);
        return view('update',compact('post'));
    }


    // edit page

    public function editPage($id){
        $post = POST::where('id',$id)->first()->toArray(); // ma tu det method ko use lite dar
        return view('edit',compact('post'));
    }

    // update page

    // public function update(Request $request){      // create net ru tu bal mot
    //     // dd($request->all());
    //     $updateData = $this->getupdateData($request);
    //     dd($updateData);
    // }

    public function update(Request $request){
        // dd($request->postId);
        $this->postValidationCheck($request);   // validtion section a twint pr sir
        // dd($request->all());
       // dd($request->all());
        $updateData = $this->getPostData($request);  // must be array
        $id = $request->postId;
        // dd($id);
       // dd($updateData);

        Post::where("id",$id)->update($updateData);  // al lo pyint phot data ka array format pyint ya ml
        return redirect() ->route('post#home')->with(['updateSuccess'=>'ဂုဏ်ယူပါတယ်။ ပို့စ်ကို အောင်မြင်စွာ မွမ်းမံပြီးပါပြီ']);    // with net ka temporary section ko use lite dar;
    }

    // get update data
    // private function getupdateData($request){    // loke soung chint a tu tu bet mot kwal ma write taw bu
    //     return [
    //         'title' => $request->updateName,
    //         'description' => $request->updateDescription
    //     ];
    // }






    //-----------------------------------------------------------------------------


    // get post data private function // equal with upper once sir

    private function getPostData($request){        // de function ko 2 nay yar ka call htar dal
  // dd("this is private function call test");
        $respond = [
         'title' => $request->postTitle,
         'description' => $request->postDescription
        ];

       return $respond;     // private function ka return pyan pay ya dal

    }


  // post validation check


   private function postValidationCheck($request){


           $validationRules = [     // Validation section pr with next pone san
               'postTitle' => 'required|min:5|max:10|unique:posts,title,'.$request->postId,  // posts ka database name / post table mar unique pyint ya mal lot pyaw dar  // table name htal ka coloumn name
               'postDescription' => 'required|min:5'   // apow ka har ka edit mar twar kyi
           ];




    $validationMessage = [
        'postTitle.required' => 'ဖြည့်စွက်ရန် လိုအပ်ပါသည်',
        'postDescription.required' => 'ဖြည့်စွက်ရန် လိုအပ်ပါသည်',
        'postTitle.min' => "စာလုံးငါးလုံးနှင့်အထက် ဖြည့်ရပါမည်",
        'postTitle.unique' => 'ခေါင်းစဉ်ဟောင်းနှင့် ကွဲပြားရပါမည်',
        'postTitle.max' => 'ဆယ်လုံးထက်နည်းရမည်'
    ];

    Validator::make($request->all(),$validationRules,$validationMessage)->validate();
}

}



