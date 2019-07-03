@extends('main')
@section('title', "Sign-in")
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Sign-in</h1>
            <p class="lead">
            Sign-in to access the admin features of the Figured Blog.
            <br>If you do not have an account, please <a href="/auth/register">register here</a> first.
            </p>
            {!! Form::open() !!}
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                
                {!! Form::checkbox('remember') !!}{!! Form::label('remember', 'Remember Me:') !!}
                
                {!! Form::submit('Sign-in', ['class' => 'btn btn-success btn-block btn-gap']) !!}
                <p><a href="{{ url('password/reset') }}">forgot password?</a></p>
            {!! Form::close() !!}
            

        </div>
    </div>

@endsection
