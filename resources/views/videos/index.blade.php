@extends('master')

@section('content')
	<h1>Videos</h1>

	<hr />

	@foreach ($videos as $video)
		<article>
			<h2><a href="{{ url('/videos', $video->id) }}"> {{ $video->title }} </a></h2>
			<div class="body">{{ $video->description }}</div>
		</article>
	@endforeach
@stop