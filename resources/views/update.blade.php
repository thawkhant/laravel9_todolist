@extends('master')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-6 offset-3">

           <div class="d-flex">
               <h3 >{{$post[0]['title']}}</h3>
               <div class="mx-2"> <i class="fas fa-circle text-success"> <small class="">Active</small></i></div>

           </div>

            <div class="d-flex">
                <div class="btn btn-sm bg-dark text-white me-2 my-3"><i class="fas fa-money-bill text-primary"></i> {{ $post[0]['price']}} kyats</div>
                <div class="btn btn-sm bg-dark text-white me-2 my-3"><i class="fas fa-map-marker-alt text-danger"></i> {{ $post[0]['address']}}</div>
                <div class="btn btn-sm bg-dark text-white me-2 my-3"><i class="fas fa-star text-warning"></i> {{ $post[0]['rating']}}</div>
                <div class="btn btn-sm bg-dark text-white me-2 my-3"><i class="fas fa-calendar-day text-info"></i> {{ $post[0]['created_at']->format('d-M-Y')}}  {{--   array ka yu de pone san // create mar ma tu tae pone si tay dl--}}</div>
                <div class="btn btn-sm bg-dark text-white me-2 my-3"><i class="fas fa-clock text-secondary"></i> {{ $post[0]['created_at']->format('h:m:s:A')}}</div>

            </div>

            <div>
            @if($post[0]['image'] == null)
                <div>
                    <img src="{{asset('404image.png')}}" class="img-thumbnail my-4 shadow">
                </div>
            @else
                <div>
                    <img src="{{asset('storage/'. $post[0]['image'])}}" class="img-thumbnail my-4 shadow" width="500px" height="300px">
                </div>
            @endif
            </div>



            <p class="text-muted">
				{{$post[0]['description']}}
			</p>



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
