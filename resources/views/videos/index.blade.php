@extends('master')

@section('content')
You are logged in!
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Videos</h1>
                    <hr />
                    @foreach ($videos as $video)
                        <article>
                            <h2><a href="{{ url('/videos', $video->id) }}"> {{ $video->title }} </a></h2>
                            <div class="body">{{ $video->description }}</div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
