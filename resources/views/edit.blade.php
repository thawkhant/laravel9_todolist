@extends('master')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-6 offset-3">
		

			<form action="{{route('post#update')}}" method="POST">
				@csrf
				<label>Post Title</label>
				<input type="text" name="updateName" id="" class="form-control my-3" placeholder="Enter post title..." value="{{$post['title']}}" required>
				<label>Post Description</label>
				<textarea class="form-control my-3" name="updateDescription" id="" cols="30" rows="10" placeholder="Enter Post Description...">
					{{$post['description']}}
				</textarea>

				<input type="submit" value="Update" name="" class="btn bg-dark text-white my-3 float-end"> 
			</form>

			<div class="my-3">
				<a href="{{route('post#updatePage',$post['id'])}}" class="nav-link text-primary"><i class="fas fa-arrow-left"></i> Back</a>
			</div>

		</div>
	</div>


</div>

@endsection