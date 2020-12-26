@extends('layouts.app')
@section('title', __('words.titles.created_tasks', ['name' => $user->name]))
@section('content')
<div id="content" class="col-md-12">
	<div id="page-header" class="page-header">
		<h1 class="text-center">@lang('words.titles.created_tasks', ['name' => $user->name])</h1>
	</div>
	@component('components.alert')
	@endcomponent
	<h2 class="text-center">@lang('words.titles.approved_tasks')</h2>
	@if (count($approved_tasks) > 0)
		@component('components.tasks_index', ['tasks' => $approved_tasks])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_approved_tasks', ['name' => $user->name])</h1>
		</div>
	@endif
	<hr>
	@if ($user->id === Auth::user()->id)
		<h2 class="text-center">@lang('words.titles.unapproved_tasks')</h2>
		@if (count($unapproved_tasks) > 0)
			@component('components.tasks_index', ['tasks' => $unapproved_tasks])
			@endcomponent
		@else
			<div class="row text-center">
				<h1 style="color:lightgray;">@lang('words.notices.no_unapproved_tasks', ['name' => $user->name])</h1>
			</div>
		@endif
		<hr>
	@endif
	<ol class="breadcrumb">
		<li><a href="{{ route('users.show', ['user_id' => Auth::user()->id]) }}"><i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.your_profile')</a></li>
		<li class="active"><i class="fas fa-code"></i>&thinsp;@lang('words.titles.created_tasks', ['name' => $user->name])</li>
	</ol>
</div>
@endsection
