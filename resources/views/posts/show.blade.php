@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">

          @if ($post->video)
           <video poster="{{ '/images/full/' . $post->image }}"  controls width="100%">
            <source src="{{ '/video/' . $post->video }}" type="video/mp4">
            @if ($post->video_sub)
              <track default src="{{ '/video/' . $post->video_sub }}">
            @endif
           </video>
          @else
           <img src="{{ '/images/full/' . $post->image }}" alt="{{$post->image}}" width="400" class="text-center" border="0">
          @endif
          
          
     
      
			<h1>{{ $post->title }}</h1>
			
			<p class="lead">{!! $post->body !!}</p>

			<hr>
			
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
                <dl class="dl-horizontal">
                    <dt>URL Slug:</dt>
                    <dd><a href="{{ url('blog/'.$post->slug) }}">{{ $post->slug }}</a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd><p>{{ $post->category->name }}</p></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
				<hr>

               <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
               </div>

               
				<div class="row">
				   <div class="col-sm-12">
                        {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing btn-gap']) }}
                    </div>
				</div>

			</div>
		</div>
	</div>

@endsection