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
            <h1>Figured Blog</h1>
            <p class="lead">Stay up-to-date with the latest news and information from our internal soclial media teams, and join in the conversation.</p>
        </div>
  </div>
@endsection
  
@section('content')
<div class="row top_post">
    <div class="col-md-12">
        @foreach($top_post as $post)
        <a href="{{ url('blog/'.$post->slug) }}">
         
           
             
                 <div class="image_top">
                   @if ($post->image)
                   <img src="{{ asset('images/medium/' . $post->image) }}" alt="{{$post->image}}">
                   @else
                   <img src="https://omi.nz/bin/rnd/?img&{{ $post->id }}" alt="Image not found">
                   @endif
                  </div>
                 <div class="post_body_top">
                     <h3>{{ $post->title }}</h3>
                     <div class="deets">
                         <small class="pub">Published in {{ $post->category->name }} @ {{ $post->created_at }} by {{ $post->user->name }}</small>
                         @if ($post->comments()->count()>0)
                         <small class="pub">Comments: {{ $post->comments()->count() }}</small>
                         @endif
                         <small class="pub">Tags: @foreach($post->tags as $tag)<span class="label label-default">{{ $tag->name }}</span>@endforeach</small>
                     </div>
                     <article>{!! $post->summary !!}</article>
                 </div>
                <b class="btn btn-default more">Full story ...</b>

        </a>
        <hr>
        @endforeach
    </div>
</div>

<div class="row">
    @foreach($posts as $post)
     @if (!$loop->first)
      <div class="col-md-4 posts">
          <div class="post">
              <div class="image" style="
                  @if ($post->image)
                  background-image: url({{ asset('images/medium/' . $post->image) }})
                  @else
                  background-image: url(https://omi.nz/bin/rnd/?img&{{ $post->id }})
                  @endif
                  ">
              </div>
              <h3>{{ $post->title }}</h3>
              <small class="pub">Published: <span class="glyphicon glyphicon-time"></span>{{ $post->created_at }}</small>
              <br><small class="pub">Posted in: {{ $post->category->name }}</small>
              <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
              <a href="{{ url('blog/'.$post->slug) }}" class="btm btn btn-default more">read more...</a>
          </div>
       </div>
     @endif
    @endforeach
</div>

<div class="text-center">
     <a href="/blog/archives" class="btn btn-primary archive-link">More blogs on the archive page...</a>
</div>
            
            
@endsection