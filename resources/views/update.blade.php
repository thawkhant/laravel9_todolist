@extends('master')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-6 offset-3">

			<h3>{{$post[0]['title']}}</h3>
			<p class="text-muted">
				{{$post[0]['description']}}
			</p>

          {{ $post[0]['created_at']->format('d-M-Y')}}  {{--   array ka yu de pone san // create mar ma tu tae pone si tay dl--}}

			<div class="my-3">
				<a href="{{route('post#home')}}" class="nav-link text-primary"><i class="fas fa-arrow-left"></i> Back to create page</a>
			</div>

		</div>
	</div>

	<div class="row my-3">
		<div class="col-3 offset-9">
			<a href="{{route('post#editPage',$post[0]['id'])}}">
				<button class="btn bg-dark text-white shadow">Edit</button>
			</a>
		</div>
	</div>
</div>

@endsection
