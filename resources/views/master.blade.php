<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pixel Plays</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/all.css') }}" rel="stylesheet"> --}}
    <link href="/css/all.css" rel="stylesheet">


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
   @include('partials.nav')

	<div class="container">
        @include('flash::message')
		@yield('content')
	</div>

    <!-- JavaScripts -->
    <script src="/js/all.js"></script>
	@yield('footer')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>
</html>
