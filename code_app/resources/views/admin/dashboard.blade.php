@extends('layouts.app')
@section('title', __('words.titles.admin_dashboard'))
@section('content')
<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	<h1><small>@lang('words.titles.tasks_recent_unapproved_list')</small></h1>
</div>
@component('components.alert')
@endcomponent
@if (count($tasks['unapproved']) > 0)
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th style="width:15%;">
						<div class="text-center">@lang('words.tasks.created_date')</div>
					</th>
					<th style="width:75%;">
						<div class="text-center">@lang('words.tasks.title')</div>
					</th>
					<th style="width:10%;">
						<div class="text-center">@lang('words.tasks.difficulty')</div>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tasks['unapproved'] as $task)
					<tr>
						<td>
							{{ $task->created_at }}
						</td>
						<td>
							<a href="{{ route('admin.tasks.edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
						</td>
						<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
							{{ config('tasks.stars')[$task->difficulty] }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@else
	<div class="row text-center">
		<h1 style="color:lightgray;">@lang('words.notices.tasks_no_unapproved_list')</h1>
	</div>
@endif
<div class="page-header" style="margin-top:-30px;">
	<h1><small>@lang('words.titles.tasks_recent_approved_list')</small></h1>
</div>
@if (count($tasks['approved']) > 0)
<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.published_date')</div>
				</th>
				<th style="width:75%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.difficulty')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks['approved'] as $task)
				<tr>
					<td>
						{{ $task->reviewed_at }}
					</td>
					<td>
						<a href="{{ route('admin.tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
					</td>
					<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
						{{ config('tasks.stars')[$task->difficulty] }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="row text-center">
		<h1 style="color:lightgray;">@lang('words.notices.tasks_no_approved_list')</h1>
	</div>
@endif
<hr>
@endsection
