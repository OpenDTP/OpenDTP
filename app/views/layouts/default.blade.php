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
		<style>

		</style>
		@show
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Favicons
		================================================== -->
<!--		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">-->
<!--		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">-->
<!--		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">-->
<!--		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">-->
		<link rel="shortcut icon" href="{{{ asset('images/shared/favicon.png') }}}">
        @section('headScript')
        {{HTML::script('js/shared/shared.min.js')}}
        @show
	</head>

	<body>
		<div id="wrap">
			<div class="navbar navbar-default navbar-fixed-top">
				 <div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                            <a class="navbar-brand brand-opendtp" href="{{{ URL::to('') }}}">OpenDTP</a>

						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
								<li {{ (Request::is('editor*') ? ' class="active"' : '') }}><a href="{{{ URL::to('editor') }}}">Editor</a></li>
								<li {{ (Request::is('project*') ? ' class="active"' : '') }}><a href="{{{ URL::to('project') }}}">Projects</a></li>
								<li {{ (Request::is('company*') ? ' class="active"' : '') }}><a href="{{{ URL::to('company') }}}">Companies</a></li>
							</ul>
							<ul class="nav navbar-nav pull-right">
								<li class="user"><a href="{{{ URL::to('user') }}}"><img src="{{{ URL::to('user/picture') }}}" /> {{{Session::get('session.username')}}}</a></li>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{{ URL::to('company/create') }}}">New company</a></li>
                                        <li><a href="{{{ URL::to('project/create') }}}">New project</a></li>
                                        <li><a href="{{{ URL::to('ticket/create') }}}">New task</a></li>
                                        <li><a href="{{{ URL::to('document/create') }}}">New document</a></li>
                                    </ul>
                                </li>
								<li><a href="{{{ URL::to('logout') }}}">Logout</a></li>
							</ul>
					  </div>
				 </div>
			</div>
		<div class="container">
			<!-- Notifications -->
			@include('shared/notifications')
			@yield('content')
		</div>
		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
    <div id="footer">
      <div class="container">
        <p class="muted credit"></p>
      </div>
    </div>
	@section('script')
	@show
	</body>
</html>
