@extends('layouts.app')
@section('title', __('title.tasks_list'))
@section('content')
<div class="container">
	<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
		<h1><small>@lang('title.tasks_list')</small></h1>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th style="width:10%;">
						<div class="text-center">@lang('th.task_rank')</div>
					</th>
					<th style="width:90%;">
						<div class="text-center">@lang('th.task_title')</div>
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
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<hr>
</div>
@endsection
