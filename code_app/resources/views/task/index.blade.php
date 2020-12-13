@extends('layouts.app')
@section('title', __('title.tasks_list'))
@section('content')
<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	<h1><small>@lang('title.tasks_list')</small></h1>
</div>
@component('components.alert')
@endcomponent
@component('components.tasks_search_form')
@endcomponent
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:10%;">
					<div class="text-center">@lang('th.task_difficulty')</div>
				</th>
				<th style="width:70%;">
					<div class="text-center">@lang('th.task_title')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('th.task_creator')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('th.task_validity')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
						{{ config('tasks.stars')[$task->difficulty] }}
					</td>
					<td>
						<a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
					</td>
					<td class="text-center">
						{{ $task->user->name }}
					</td>
					<td>
						{{ $task->examinees == 0 ? __('label.task_no_examinees') : $task->solved / $task->examinees }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{ $tasks->links() }}
	</div>
</div>
<hr>
@endsection
