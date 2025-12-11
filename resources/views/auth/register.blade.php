@extends('main')
@section('title', "Register")
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Register</h1>
            <p class="lead">
              {!! \App\Config::where(['name' => 'register_blurb'])->first()->value !!}
            </p>
            {!! Form::open() !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}

                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}

                {!! Form::label('password_confirmation', 'Confrim Password:') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                
                
                {!! Form::submit('Register', ['class' => 'btn btn-success btn-block btn-gap']) !!}
            {!! Form::close() !!}
            

        </div>
    </div>

@endsection
