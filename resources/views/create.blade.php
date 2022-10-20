@extends('master');

@section("content")
 
 <div class="container">
     <div class="row mt-5">
         <div class="col-5 ">
             <div class="p-3">
                 <form action="{{route('post#create')}}" method="POST">
                    @csrf
                    <div class="text-group mb-3">
                     <label for="">Post Title</label>
                     <input type="text" name="postTitle" class="form-control" placeholder="Enter Post Title..." required>
                 </div>
                 <div class="text-group mb-3">
                     <label for="">Post Description</label>
                     <textarea name="postDescription" class="form-control" cols="30" rows="10" placeholder="Enter Post Description" required></textarea>
                 </div>
                 <div class="mb-3">
                     <input type="submit" name="" value="Create" class="btn btn-danger">
                 </div>
                 </form>
             </div>
         </div>
         <div class="col-7 ">
             <div class="data-container">
                  
                  @for($i=0;$i<3;$i++)
                  <div class="post p-3 shadow-lg mb-4">
                     <h5>Title</h5>
                     <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                     <div class="text-end">
                         <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-file-alt"></i></button>
                     </div>
                 </div>
                  
                  @endfor

               
             </div>
         </div>
     </div>
 </div>

@endsection