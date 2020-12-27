@extends('layouts.app')
@section('title', __('words.titles.unapproved_tasks_list'))
@section('content')
<div id="content" class="col-lg-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.unapproved_tasks_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th style="width:10%;">
						<div class="text-center">@lang('words.tasks.difficulty')</div>
					</th>
					<th style="width:90%;">
						<div class="text-center">@lang('words.tasks.title')</div>
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
							<a href="{{ route('admin.tasks.edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<hr>
</div>
@endsection
