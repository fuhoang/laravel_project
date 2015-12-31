@extends('master')

@section('content')
	<h1>Create a new video</h1>
	<hr />

	{!! Form::open(['url' => 'videos']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop