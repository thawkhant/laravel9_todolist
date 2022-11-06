@extends('master');

@section("content")

 <div class="container">
     <div class="row mt-5">
         <div class="col-5 ">
             <div class="p-3">

               @if(session('insertSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('insertSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
               @endif

                @if(session('updateSuccess'))
                <div class="alert-message">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('updateSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
               @endif

          <!--   @if ($errors->any())              laravel doc ka copy lar dar
            <div class="alert alert-danger">
                  <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                 </ul>
            </div>
            @endif -->

                 <form action="{{route('post#create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="text-group mb-3">
                     <label for="" class="mb-2">ခေါင်းစဉ်</label>
                     <input type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror" placeholder="ပို့စ်ခေါင်းစဉ်ထည့်ပါ..." value="{{old('postTitle')}}"><!-- value a hong kyan aung lot  -->

                    @error('postTitle')
                        <small class="text-danger">{{$message}}</small>
{{--                        <small class="invalid-feedback">ပို့စ်ခေါင်းစဉ်ကို ဖြည့်ရပါမည်</small>--}}
                        @enderror
                 </div>
                 <div class="text-group mb-3">
                     <label for="" class="mb-2">ဖော်ပြချက်</label>
                     <textarea name="postDescription" class="form-control  @error('postDescription') is-invalid @enderror" cols="30" rows="10" placeholder="ပို့စ်ဖော်ပြချက်ကို ရိုက်ထည့်ပါ ">{{old('postDescription')}}</textarea>
                  @error("postDescription")
                     <small class="text-danger">{{$message}}</small>
{{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                     @enderror
                 </div>

                     <div class="text-group mb-3">
                         <label for="" class="mb-2">ဓာတ်ပုံ</label>
                         <input type="file" name="postImage" class="form-control @error('postImage') is-invalid @enderror" value="{{old('postImage')}}">
                         @error("postImage")
                         <small class="text-danger">{{$message}}</small>
                         {{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                         @enderror
                     </div>

                     <div class="text-group mb-3">
                         <label for="" class="mb-2">ကုန်ကျစရိတ်</label>
                         <input type="number" name="postFee" class="form-control  @error('postFee') is-invalid @enderror"  placeholder="ကုန်ကျစရိတ်ထည့်ပါ..." value="{{old('postFee')}}">
                         @error("postFee")
                         <small class="text-danger">{{$message}}</small>
                         {{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                         @enderror
                     </div>

                     <div class="text-group mb-3">
                         <label for="" class="mb-2">လိပ်စာ</label>
                         <input type="text" name="postAddress" class="form-control  @error('postAddress') is-invalid @enderror"  placeholder="လိပ်စာထည့်ပါ..." value="{{old('postAddress')}}">
                         @error("postAddress")
                         <small class="text-danger">{{$message}}</small>
                         {{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                         @enderror
                     </div>

                     <div class="text-group mb-3">
                         <label for="" class="mb-2">အဆင့်သတ်မှတ်ချက်</label>
                         <input type="number" min="0" max="5" name="postRating" class="form-control  @error('postRating') is-invalid @enderror"  value="{{old('postRating')}}" placeholder="အဆင့်သတ်မှတ်ချက်ထည့်ပါ.... ">
                         @error("postRating")
                         <small class="text-danger">{{$message}}</small>
                         {{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                         @enderror
                     </div>

                 <div class="mb-3">
                     <input type="submit" name="" value="ပို့စ်ဖန်တီးရန်" class="btn btn-danger">
                 </div>
                 </form>
             </div>
         </div>
         <div class="col-7 ">
            <h3 class="mb-3">
               <div class="row">
                 <div class="col-5"> စုစုပေါင်း - {{$posts->total()}} </div>    <!-- pagination ka ya lar dar pr sir  // dd net kyi bee yu dr -->
                   <div class="col-5 offset-2">
                       <form method="GET" action="{{ route('post#createPage') }}">
                           <div class="row">
                           <input type="text" name="searchKey" value="{{request('searchKey')}}" id="" class="form-control col" placeholder="ခေါင်းစဉ်ကိုရှာပါ......">   {{--  value ka url ka value kyan phot a twint--}}
                               <button type="submit" class="btn btn-danger col-2"><i class="fas fa-search"></i></button>
                           </div>
                       </form>
                   </div>



               </div>
            </h3>
             <div class="data-container">

               @if(count($posts) != 0)
                   @foreach ($posts as $item)   <!-- foreach -->
                       <div class="post p-3 shadow-lg mb-4" style="cursor:pointer">
                           <div class="row">
                               <h5 class="col-7">{{$item['title']}} <!-- | {{$item['id']}} --></h5>
                               {{--                     <span class="col">{{$item['created_at']}}</span>--}}
                               <h5 class="col-4 offset-1">{{$item->created_at->format('d-M-Y')}}</h5>
                           </div>
                       <!-- <p class="text-muted">{{substr($item['description'],0,30)}}</p>  // pure php -->
                           <p class="text-muted">{{Str::words($item['description'],10,'...')}}</p>

                           <span>
                         <small> <i class="fas fa-money-bill text-success"></i> {{$item->price}} kyats</small>
                      </span>
                           |
                           <span>
                          <small><i class="fas fa-map-marker-alt text-danger"></i> {{$item->address}}</small>
                      </span>
                           |
                           <span>
                          <small><i class="fas fa-star text-warning"></i> {{$item->rating}}</small>
                      </span>

                           <div class="text-end">
                           <!--  <a href="{{url('post/delete/' . $item['id'])}}">  // url nat twar dar -->

                               <a href="{{route('post#delete',$item['id'])}}">
                                   <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> ဖျက်ရန်</button>
                               </a>


                               <!--  delete method  -->
                           <!-- <form action="{{route('post#delete',$item['id']) }}" method="POST">
                        @csrf
                           @method('delete')
                               <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> ဖျက်ရန်</button>
                          </form> -->

                               <a href="{{route('post#updatePage',$item['id'])}}">
                                   <button class="btn btn-sm btn-primary"><i class="fas fa-file-alt"></i> အပြည့်အစုံဖတ်ရန်</button>
                               </a>
                           </div>
                       </div>

                   @endforeach

                   @else

                   <h3 class="text-danger text-center mt-5">သင်ရှာဖွေနေသည့် ဒေတာမရှိပါ....</h3>

               @endif
<!--
                 @for ($i=0;$i<count($posts);$i++)              // for
                 <div class="post p-3 shadow-lg mb-4">
                     <h5>{{$posts[$i]['title']}}</h5>
                     <p class="text-muted">{{$posts[$i]['description']}}</p>
                     <div class="text-end">
                         <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-file-alt"></i></button>
                     </div>
                 </div> -->




                <!--  @endfor -->


             </div>


        {{$posts->appends(request()->query())->links()}}    <!--  pagination a twint pr sir // looping ye a pyin mar write ya dal // provider mar lal import loke pay ya oak ml   // page ka append ma pyint aung-->

         </div>
     </div>
 </div>

@endsection
