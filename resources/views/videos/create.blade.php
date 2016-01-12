@extends('master')

@section('content')
	<h1>Create a new video</h1>
	<hr />

	{!! Form::model($video = new \App\Video, ['url' => 'videos']) !!}
		@include ('videos.form', ['submitButtonText' => 'Add Video'])
	{!! Form::close() !!}
	@include ('errors.list')
@stop