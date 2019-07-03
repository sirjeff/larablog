@extends('main')
@section('title', 'Forgot my Password')
@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="card-header">Reset Password</div>

				<div class="card-body">
					
					{!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}
						
					{{ Form::hidden('token', $token) }}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', $email, ['class' => 'form-control']) }}

					{{ Form::label('password', 'New Password:') }}
					{{ Form::password('password', ['class' => 'form-control']) }}

					{{ Form::label('password_confirmation', 'Confirm New Password:') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-gap']) }}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection