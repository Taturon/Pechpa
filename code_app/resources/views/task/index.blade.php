@extends('layouts.app')
@section('title', __('words.titles.tasks_list'))
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
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:15%;">
							<div class="text-center">@lang('words.tasks.difficulty')</div>
						</th>
						<th style="width:55%;">
							<div class="text-center">@lang('words.tasks.title')</div>
						</th>
						<th style="width:15%;">
							<div class="text-center">@lang('words.tasks.creator')</div>
						</th>
						<th style="width:15%;">
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
								<a href="{{ route('users.show', ['user' => $task->user->id]) }}">
									<img src="{{ asset('storage/icons/' . $task->user->icon) }}" width="20px" height="20px">
									{{ $task->user->name }}
								</a>
							</td>
							<td class="text-center">
								{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $tasks->links() }}
			</div>
		</div>
	@else
		<div class="row text-center">
			<h1 id="notice-block">@lang('words.notices.no_tasks')</h1>
		</div>
		<hr>
	@endif
</div>
@endsection
