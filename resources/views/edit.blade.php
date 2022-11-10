@extends('master')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-6 offset-3">


			<form action="{{route('post#update')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<label>Post Title</label>
				<input type="hidden" name="postId" value="{{$post['id']}}">  <!--  id ko ya yr dar  next level net -->
			<!-- 	<input type="text" name="updateName" id="" class="form-control my-3" placeholder="Enter post title..." value="{{$post['title']}}" required> -->
				<input type="text" name="postTitle" id="" class="form-control my-3  @error ('postTitle') is-invalid @enderror" placeholder="Enter post title..." value="{{ old('postTitle',$post['title']) }}" >  <!--  kwal ma write daw dar/create net tu lot // old ko use htar kar ka database htal ka data ko pyan yu phot-->

                @error('postTitle')
                <small class="text-danger">{{$message}}</small>
                <br>
                @enderror
                <br>

                <label>Image</label>
                <div>
                    @if($post['image'] == null)
                        <div>
                            <img src="{{asset('404image.png')}}" class="img-thumbnail mt-4 shadow">
                        </div>
                    @else
                        <div>
                            <img src="{{asset('storage/'. $post['image'])}}" class="img-thumbnail  shadow"  width="500px" height="300px">
                        </div>
                    @endif
                </div>
                <input type="file" name="postImage" class="form-control @error('postImage') is-invalid @enderror" value="{{old('postImage')}}">
                @error("postImage")
                <small class="text-danger">{{$message}}</small>
                {{--                     <small class="text-danger">ပို့စ်ဖော်ပြချက်ကို ဖြည့်စွက်ရပါမည်</small>--}}
                @enderror

                <br>


                <label>Post Description</label>
				<!-- <textarea class="form-control my-3" name="updateDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">
					{{$post['description']}}
				</textarea> -->
				<textarea class="form-control my-3  @error ('postDescription') is-invalid @enderror" name="postDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">{{old('postDescription',$post['description'])}}</textarea>
                @error("postDescription")
                <small class="text-danger">{{$message}}</small>
                @enderror


                <label>Post Fee</label>
            <!-- <textarea class="form-control my-3" name="updateDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">
                </textarea> -->
                <input type="text" name="postFee" id="" class="form-control my-3  " placeholder="Enter post title..." value="{{ old('postTitle',$post['price']) }}" >




                <label>Post Address</label>
            <!-- <textarea class="form-control my-3" name="updateDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">
                </textarea> -->
                <input type="text" name="postAddress" id="" class="form-control my-3 " placeholder="Enter post title..." value="{{ old('postTitle',$post['address']) }}" >



                <label>Post Rating</label>
            <!-- <textarea class="form-control my-3" name="updateDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">
                </textarea> -->
                <input type="text" name="postRating" id="" class="form-control my-3  " placeholder="Enter post title..." value="{{ old('postTitle',$post['rating']) }}" >


                <input type="submit" value="Update" name="" class="btn bg-dark text-white my-3 float-end">
			</form>

			<div class="my-3">
				<a href="{{route('post#updatePage',$post['id'])}}" class="nav-link text-primary"><i class="fas fa-arrow-left"></i> Back</a>
			</div>

		</div>
	</div>


</div>

@endsection
