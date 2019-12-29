@extends('main')
@section('title','Homepage')
@section('css')
  <style>
   nav.navbar{margin-bottom:0px}
  </style>
@endsection

@section('hero')
  <div class="container-fluid hero-cover">
        <div class="jumbotron">
            <h1>OMI-Blog</h1>
            <h2>Your search results are below...</h2>
        </div>
  </div>
@endsection
  
@section('content')


<div class="container">
    @if(isset($details))
    <p>You searched for <b> {{ $query }} </b></p>

            @foreach($details as $post)

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $post->title }}</h2>
			<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

			<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

			<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
			<hr>
		</div>
	</div>
  
  
            @endforeach

    @endif
</div>
   
@endsection
