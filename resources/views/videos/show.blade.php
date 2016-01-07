@extends('master')

@section('content')
	<h1>{{ $video->title }}</h1>
	<hr />

	<article>
		<div class="body">{{ $video->description }}</div>
	</article>

    @unless ($video->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach ($video->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless
@stop
