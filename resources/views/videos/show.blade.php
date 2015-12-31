@extends('master')

@section('content')
	<h1>{{ $video->title }}</h1>
	<hr />

	<article>
		<div class="body">{{ $video->description }}</div>
	</article>
@stop