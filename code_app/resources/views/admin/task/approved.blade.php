@extends('layouts.app')
@section('title', __('words.titles.approved_tasks_list'))
@section('content')
<div id="content" class="col-lg-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.approved_tasks_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($tasks) > 0)
		@component('components.tasks_index_pages.approved', ['tasks' => $tasks])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.tasks_no_approved_list')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
