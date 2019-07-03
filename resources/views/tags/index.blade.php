@extends('main')
@section('title','All Tags')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>All Tags</h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <hr>
     </div>


    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>count</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-default">{{ $tag->name }}</a></td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td>{{ date('M j, Y',strtotime($tag->created_at)) }}</td>
                            <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-default">View</a> <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-default">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h5>Page {{ $tags->currentPage() }} of {{ $tags->lastPage() }}</h5>
                {!! $tags->links(); !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h3 style="margin-top:0">New Tag</h3>
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                    {{ Form::text('name', null, ['class' => 'form-control' ,'placeholder' => 'Tag Name']) }}
                {!! Form::close() !!}
            </div>
        </div>

    </div>


@endsection
