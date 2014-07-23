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
		{{HTML::style('assets/css/style.css')}}
		{{HTML::style('bootstrap/css/bootstrap.css')}}
		{{HTML::style('assets/css/flat-ui.css')}}
		{{HTML::style('assets/css/themes/default/style.min.css')}}
		{{HTML::style('assets/css/ui-lightness/jquery-ui-1.10.4.custom.min.css')}}
		{{HTML::style('assets/css/MapEditor/jquery-mapeditor.css')}}
		<style>
        body {
            padding: 50px;
        }

		</style>
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
		<div id="wrap">
			<div class="navbar navbar-default navbar-inverse navbar-fixed-top">
				 <div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
											<a class="navbar-brand brand-opendtp" href="index.html">OpenDTP</a>

						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
								<li {{ (Request::is('editor/*') ? ' class="active"' : '') }}><a href="{{{ URL::to('editor/dashboard') }}}">Editor</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="projects.html">Manage projects</a></li>
										<li><a href="teams.html">Manage teams</a></li>
										<li><a href="#">Plan</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Assets<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="fonts.html">Fonts</a></li>
										<li><a href="images.html">Images</a></li>
										<li><a href="articles.html">Articles</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacts<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Manage contacts</a></li>
										<li><a href="#">Manage groups</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav pull-right">
								<li class="notification">
									<a href="#">2 <span class="glyphicon glyphicon-calendar"></span></a>
								</li>
								<li class="notification">
									<a href="#">3 <span class="glyphicon glyphicon-info-sign"></span></a>
								</li>
								@if(Session::has('session.token'))
								<li><a href="{{{ URL::to('user') }}}">Logged in as {{{Session::get('session.username')}}}</a></li>
								<li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
								@else
								<li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
								<li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('Register') }}}</a></li>
								@endif
							</ul>
					  </div>
				 </div>
			</div>
			<div class="navbar navbar-default">
				<div class="container">
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li {{ (Request::is('editor/dashboard') ? ' class="active"' : '') }}><a href="{{{ URL::to('editor/dashboard') }}}">Dashboard</a></li>
							<li {{ (Request::is('editor/documents') ? ' class="active"' : '') }}><a href="{{{ URL::to('editor/documents') }}}">Documents Management</a></li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Upload</a></li>
							<li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">Download</a></li>
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
        <p class="muted credit">OpenDTP homepage.</p>
      </div>
    </div>
	@section('script')
	{{HTML::script('assets/js/jquery-1.11.0.min.js')}}
	{{HTML::script('assets/js/jquery-ui-1.10.4.custom.min.js')}}
	{{HTML::script('assets/js/ckeditor/ckeditor.js')}}
	{{HTML::script('assets/js/ckeditor/adapters/jquery.js')}}
	{{HTML::script('assets/js/MapEditor/jquery-mapeditor.min.js')}}
	{{HTML::script('bootstrap/js/bootstrap.min.js')}}
	{{HTML::script('assets/js/Chart.min.js')}}
	<script type="text/javascript">
		$(document).ready(function () {
			var deconstruction = {
				"width": 210,
				"height": 450,
				"unit": "mm",
				"dpi": 72,
				"name" : "plop-123",
				"spreads" : [
					{
						"page1" : {
							"preview": "assets/img/editor/preview.jpg",
							"blocs": {
								"box1234": {
									"x": 105,
									"y": 148,
									"width": 30,
									"height": 10,
									"type": "text",
									"content" : "ceci est un premier bloc"
								},
								"box12": {
									"x": 7,
									"y": 45,
									"width": 40,
									"height": 50,
									"type": "text",
									"content" : "ceci est un second bloc"
								},
								"box13": {
									"x": 50,
									"y": 150,
									"width": 70,
									"height": 50,
									"type": "text",
									"content" : "jamais deux sans trois"
								},
								"boxImg968": {
									"x": 13,
									"y": 6,
									"width": 40,
									"height": 50,
									"type": "image",
									"content": "http://blog.stackoverflow.com/audio/stackoverflow-300.png"
								}
							}
						},
						"page2" : {
							"preview": "assets/img/editor/preview.jpg",
							"blocs": {
								"box1234": {
									"x": 105,
									"y": 148,
									"width": 30,
									"height": 10,
									"type": "text",
									"content" : "ceci est un premier bloc"
								},
								"box12": {
									"x": 7,
									"y": 45,
									"width": 40,
									"height": 50,
									"type": "text",
									"content" : "ceci est un second bloc"
								},
								"box13": {
									"x": 50,
									"y": 150,
									"width": 70,
									"height": 50,
									"type": "text",
									"content" : "jamais deux sans trois"
								},
								"boxImg968": {
									"x": 13,
									"y": 6,
									"width": 40,
									"height": 50,
									"type": "image",
									"content": "http://blog.stackoverflow.com/audio/stackoverflow-300.png"
								}
							}
						},
						"page3" : {
							"preview": "assets/img/editor/preview.jpg",
							"blocs": {
								"box1234": {
									"x": 105,
									"y": 148,
									"width": 30,
									"height": 10,
									"type": "text",
									"content" : "ceci est un premier bloc"
								},
								"box12": {
									"x": 7,
									"y": 45,
									"width": 40,
									"height": 50,
									"type": "text",
									"content" : "ceci est un second bloc"
								},
								"box13": {
									"x": 50,
									"y": 150,
									"width": 70,
									"height": 50,
									"type": "text",
									"content" : "jamais deux sans trois"
								},
								"boxImg968": {
									"x": 13,
									"y": 6,
									"width": 40,
									"height": 50,
									"type": "image",
									"content": "http://blog.stackoverflow.com/audio/stackoverflow-300.png"
								}
							}
						}
					},
					{
						"page1" : {
							"preview": "assets/img/editor/preview.jpg",
							"blocs": {
								"box1234": {
									"x": 105,
									"y": 148,
									"width": 30,
									"height": 10,
									"type": "text",
									"content" : "ceci est un premier bloc"
								},
								"box12": {
									"x": 7,
									"y": 45,
									"width": 40,
									"height": 50,
									"type": "text",
									"content" : "ceci est un second bloc"
								},
								"box13": {
									"x": 50,
									"y": 150,
									"width": 70,
									"height": 50,
									"type": "text",
									"content" : "jamais deux sans trois"
								},
								"boxImg968": {
									"x": 13,
									"y": 6,
									"width": 40,
									"height": 50,
									"type": "image",
									"content": "http://blog.stackoverflow.com/audio/stackoverflow-300.png"
								}
							}
						}
					}
				]
			};
			$('#map').mapeditor(deconstruction);
		})
	</script>
	@show
  @yield('scripts')
	</body>
</html>
