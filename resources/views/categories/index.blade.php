@extends('main')
@section('title','All Categories')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>All Categories</h1>
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
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ date('M j, Y',strtotime($category->created_at)) }}</td>
                            <td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-default">View</a> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-default">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h5>Page {{ $categories->currentPage() }} of {{ $categories->lastPage() }}</h5>
                {!! $categories->links(); !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h3 style="margin-top:0">New Category</h3>
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    {{ Form::text('name', null, ['class' => 'form-control' ,'placeholder' => 'Category Name']) }}
                {!! Form::close() !!}
            </div>
        </div>

    </div>


@endsection
