@extends('layouts.app')
@section('title', __('words.titles.tasks_list'))
@section('content')
<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	<h1><small>@lang('words.titles.tasks_list')</small></h1>
</div>
@component('components.alert')
@endcomponent
@component('components.errors_alert')
@endcomponent
@component('components.tasks_search_form')
@endcomponent
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.difficulty')</div>
				</th>
				<th style="width:70%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.creator')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.validity.validity')</div>
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
					<td class="text-center">
						{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : $task->solved / $task->examinees }}
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
