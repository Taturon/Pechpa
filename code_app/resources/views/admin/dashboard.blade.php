@extends('layouts.app')
@section('title', __('words.titles.admin_dashboard'))
@section('content')
<div id="content" class="col-lg-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.tasks_recent_unapproved_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($tasks['unapproved']) > 0)
		@component('components.tasks_index_pages.unapproved', ['tasks' => $tasks['unapproved']])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.tasks_no_unapproved_list')</h1>
		</div>
	@endif
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.tasks_recent_approved_list')</h1>
	</div>
	@if (count($tasks['approved']) > 0)
		@component('components.tasks_index_pages.approved', ['tasks' => $tasks['approved']])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.tasks_no_approved_list')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
