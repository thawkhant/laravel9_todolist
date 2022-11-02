<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // customer create page
    public function create(){
        // database htal ka data yu dr

       //$posts = Post::orderBy('created_at','desc')->get()->toArray();  // === Select * From blahh blahh...




         $posts = Post::orderBy('created_at','desc')->paginate(3);  // paginate loke dr sir
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
        $post = POST::where("id",$id)->get()->toArray();
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
        'postTitle' => 'required|min:5|max:10|unique:posts,title',  // posts ka database name / post table mar unique pyint ya mal lot pyaw dar  // table name htal ka coloumn name
        'postDescription' => 'required|min:5'
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



