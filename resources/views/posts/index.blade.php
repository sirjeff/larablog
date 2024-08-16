@extends('main')
@section('title','All Posts')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-3 new_post">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-block btn-h1-spacing btn-gap"><span class="glyphicon glyphicon-plus"></span> New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <hr>
     </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Title</th>
                        <th>Post</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('posts.show', $post->id) }}"><img src="{{ asset('images/tiny/' . $post->image) }}" alt="{{$post->image}}" width="100%"></a></td>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->summary), 0, 50) }}{{ strlen(strip_tags($post->summary)) > 50 ? "..." : "" }}</td>
                            <td>
                             <a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                             <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection