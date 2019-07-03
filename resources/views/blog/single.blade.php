@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "$titleTag")

@section('content')
 
<div class="row">
    <div class="col-md-6">
        <div class="post_image">
          @if ($post->image)
          <img src="{{ asset('images/full/' . $post->image) }}" alt="{{$post->image}}" width="100%">
          @else
          <img src="https://omi.nz/bin/rnd/?img&{{ $post->id }}" alt="Image not found">
          @endif
         </div>
    </div>

    <div class="col-md-6 post_deets">
        <h1>{{ $post->title }}</h1>
        <hr>
        <dl class="dl-horizontal">
            <dt>Author:</dt>
            <dd>{{ $post->user->name }}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Published in:</dt>
            <dd>{{ $post->category->name }}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Published date:</dt>
            <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Tags:</dt>
            <dd>@foreach($post->tags as $tag)<span class="label label-default">{{ $tag->name }}</span>@endforeach</dd>
        </dl>
    </div>
</div>

<div class="row post_body">
    <div class="col-md-12">
        <p>{!! $post->body !!}</p>
    </div>
</div>

  @if ($post->comments()->count()>0)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image" alt="gravatar image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>
						
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
  @endif

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
     <hr>
     <h4>Have your say ...</h4>
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
				
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection