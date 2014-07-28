<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        @section('title')
        OpenDTP
        @show
    </title>
    <meta name="keywords" content="opendtp, open, dtp, open-source" />
    <meta name="author" content="Gaëtan Gueraud" />
    <meta name="description" content="Official website of OpenDTP." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('css')
    {{HTML::style('css/shared/shared.min.css')}}
    @show
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
    <link rel="shortcut icon" href="{{{ asset('assets/img/favicon.png') }}}">
</head>

<body>
@yield('content')
@section('script')
@show
@yield('scripts')
</body>
</html>
