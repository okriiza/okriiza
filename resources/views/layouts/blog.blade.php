<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
	<title>@yield('title')</title>
	@stack('prepend-style')
	@include('includes.style-blog')
	@stack('addon-style')
</head>
<body>

@include('includes.navbar-blog')
@include('includes.back-to-top')
@yield('content')
@include('includes.footer-blog')

@stack('prepend-script')
@include('includes.script-blog')
@stack('addon-script')

</body>
</html>