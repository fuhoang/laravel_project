@extends('master')

@section('content')
	<h1> Edit: {!! $video->title !!}</h1>
	<hr />

	{!! Form::model($video,['method' => 'PATCH', 'action' => ['VideosController@update', $video->id ]]) !!}
		@include ('videos.form', ['submitButtonText' => 'Update Video'])
	{!! Form::close() !!}
	@include ('errors.list')
@stop