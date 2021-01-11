@extends('layouts.app')
@section('title', __('words.titles.tasks_list'))
@section('top-image')
	@if (!Auth::guard('admin')->check() && !Auth::guard('user')->check() && strpos(url()->current(), '/admin') === false)
		<div class="row">
			<div id="top-image"></div>
		</div>
	@endif
@endsection
@if (Auth::guard('user')->check())
	@section('side_bar')
		@component('components.profile_side_bar')
		@endcomponent
	@endsection
@endif
@section('content')
<div id="content" class="col-lg-{{ Auth::guard('user')->check() ? 9 : 12 }}">
	<div id="page-header" class="page-header">
		<h1 class="text-center">@lang('words.titles.tasks_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@component('components.errors_alert')
	@endcomponent
	@component('components.tasks_search_form', ['serached' => $tasks->serached])
	@endcomponent
	<hr>
	@if (count($tasks) > 0)
		@if (Auth::guard('user')->check())
			@component('components.tasks_index_pages.after_login', ['tasks' => $tasks])
			@endcomponent
		@else
			@component('components.tasks_index_pages.before_login', ['tasks' => $tasks])
			@endcomponent
		@endif
	@else
		<div class="row text-center">
			<h1 id="notice-block">@lang('words.notices.no_tasks')</h1>
		</div>
		<hr>
	@endif
</div>
@endsection
