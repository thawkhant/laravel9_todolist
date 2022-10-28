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

                 <form action="{{route('post#create')}}" method="POST">
                    @csrf
                    <div class="text-group mb-3">
                     <label for="" class="mb-2">ခေါင်းစဉ်</label>
                     <input type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror" placeholder="ပို့စ်ခေါင်းစဉ်ထည့်ပါ..." value="{{old('postTitle')}}"><!-- value a hong kyan aung lot  -->
                                    
                    @error('postTitle')
                        <small class="invalid-feedback">ပို့စ်ခေါင်းစဉ်ကို ဖြည့်ရပါမည်</small>        
                    @enderror 
                 </div>
                 <div class="text-group mb-3">
                     <label for="" class="mb-2">ဖော်ပြချက်</label>
                     <textarea name="postDescription" class="form-control  @error('postDescription') is-invalid @enderror" cols="30" rows="10" placeholder="ပို့စ်ဖော်ပြချက်ကို ရိုက်ထည့်ပါ ">{{old('postDescription')}}</textarea>
                     @error("postDescription")
                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small> 
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
                Total - {{$posts->total()}}   <!-- pagination ka ya lar dar pr sir  // dd net kyi bee yu dr -->
            </h3>
             <div class="data-container">
                  
                  @foreach ($posts as $item)   <!-- foreach -->
                  <div class="post p-3 shadow-lg mb-4" style="cursor:pointer">
                    <div class="row">
                     <h5 class="col-7">{{$item['title']}} <!-- | {{$item['id']}} --></h5>
                     <span class="col">{{$item['created_at']}}</span>
                    </div>
                     <!-- <p class="text-muted">{{substr($item['description'],0,30)}}</p>  // pure php -->
                     <p class="text-muted">{{Str::words($item['description'],10,'...')}}</p> 
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

           
        {{$posts->links()}}    <!--  pagination a twint pr sir // looping ye a pyin mar write ya dal // provider mar lal import loke pay ya oak ml -->

         </div>
     </div>
 </div>

@endsection