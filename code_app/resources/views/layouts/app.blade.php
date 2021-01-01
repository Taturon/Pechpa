<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Pechpa!') . ' | ' }}@yield('title')</title>

	<!-- Styles -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('/favicons/favicon.ico') }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/additional.css') }}" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,600;1,700&family=Kosugi+Maru&display=swap" rel="stylesheet">
	<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-MML-AM_CHTML"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,600;1,700&family=Kosugi+Maru&display=swap');
		body {font-family:'Chakra Petch','Kosugi Maru',sans-serif;font-weight:600;background-color:aliceblue;}
	</style>

	@yield('header')
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand"
						href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : route('tasks.index') }}"
						style="font-family:'Chakra Petch',sans-serif;font-weight:700;font-size:25px;font-style:italic;"
					>
						{{ config('app.name', 'Pechpa!') }}
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (!Auth::guard('admin')->check() && !Auth::guard('user')->check() && strpos(url()->current(), '/admin') === false)
							<li>
								<a href="{{ route('guest_login') }}">
									<i class="fas fa-sign-in-alt"></i>&thinsp;@lang('words.buttons.guest_login')
								</a>
							</li>
							<li>
								<a href="{{ route('login') }}">
									<i class="fas fa-sign-in-alt"></i>&thinsp;@lang('words.buttons.login')
								</a>
							</li>
							<li>
								<a href="{{ route('register') }}">
									<i class="fas fa-user-plus"></i>&thinsp;@lang('words.buttons.register')
								</a>
							</li>
						@endif
						@if (Auth::guard('user')->check())
							<li>
								<a href="{{ route('tasks.index') }}">
									<i class="fas fa-code"></i>&thinsp;@lang('words.titles.tasks_list')
								</a>
							</li>
							<li>
								<a href="{{ route('tasks.create') }}">
									<i class="fas fa-code"></i>&thinsp;@lang('words.titles.task_create')
								</a>
							</li>
							<li>
								<a href="{{ route('answers.index') }}">
									<i class="fas fa-tasks"></i>&thinsp;@lang('words.titles.answers_list')
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu">
									<li>
										<a href="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();"
										>
											<i class="fas fa-sign-out-alt"></i>&thinsp;@lang('words.buttons.logout')
										</a>

										<form id="logout-form" action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
									<li>
										<a href="{{ route('users.show', ['user_id' => Auth::user()->id]) }}">
											<i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.your_profile')
										</a>
									</li>
									<li>
										<a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}">
											<i class="fas fa-user-edit"></i>&thinsp;@lang('words.titles.profile_edit')
										</a>
									</li>
								</ul>
							</li>
						@endif
						@if (Auth::guard('admin')->check())
							<li>
								<a href="{{ route('admin.approved') }}">
									<i class="fas fa-code"></i>&thinsp;@lang('words.titles.approved_tasks_list')
								</a>
							</li>
							<li>
								<a href="{{ route('admin.unapproved') }}">
									<i class="fas fa-code"></i>&thinsp;@lang('words.titles.unapproved_tasks_list')
								</a>
							</li>
							<li>
								<a href="{{ route('admin.inquiries.index') }}">
									<i class="fas fa-question-circle"></i>&thinsp;@lang('words.titles.inquiries_list')
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
									{{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu">
									<li>
										<a href="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();"
										>
											<i class="fas fa-sign-out-alt"></i>&thinsp;@lang('words.buttons.logout')
										</a>

										<form id="logout-form" action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
									<li>
										<a href="{{ route('admin.dashboard') }}">
											<i class="fas fa-list"></i>&thinsp;@lang('words.titles.admin_dashboard')
										</a>
									</li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			@yield('side_bar')
			@yield('content')
		</div>

		<nav class="navbar navbar-default navbar-static-bottom">
			<div class="container">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guard('user')->check())
						<li class="text-center">
							<a href="{{ route('inquiries.create') }}">
								<i class="fas fa-question-circle"></i>&thinsp;@lang('words.titles.inquiry_create')
							</a>
						</li>
					@endif
				</ul>
			</div>
		</nav>

	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
