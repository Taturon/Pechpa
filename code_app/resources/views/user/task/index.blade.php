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
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:15%;">
							<div class="text-center">@lang('words.tasks.difficulty')</div>
						</th>
						<th style="width:60%;">
							<div class="text-center">@lang('words.tasks.title')</div>
						</th>
						<th style="width:15%;">
							<div class="text-center">@lang('words.tasks.approved_date')</div>
						</th>
						<th style="width:10%;">
							<div class="text-center">@lang('words.tasks.validity.validity')</div>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($approved_tasks as $task)
						<tr>
							<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
								{{ config('tasks.stars')[$task->difficulty] }}
							</td>
							<td>
								<a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
							</td>
							<td class="text-center">
								{{ $task->reviewed_at }}
							</td>
							<td class="text-center">
								{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $approved_tasks->appends(request()->input())->links() }}
			</div>
		</div>
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_approved_tasks', ['name' => $user->name])</h1>
		</div>
	@endif
	<hr>
	@if ($user->id === Auth::user()->id)
		<h2 class="text-center">@lang('words.titles.unapproved_tasks')</h2>
		@if (count($unapproved_tasks) > 0)
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th style="width:15%;">
								<div class="text-center">@lang('words.tasks.difficulty')</div>
							</th>
							<th style="width:60%;">
								<div class="text-center">@lang('words.tasks.title')</div>
							</th>
							<th style="width:15%;">
								<div class="text-center">@lang('words.tasks.created_and_updated_date')</div>
							</th>
							<th style="width:10%;">
								<div class="text-center">@lang('words.buttons.delete')</div>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($unapproved_tasks as $task)
							<tr>
								<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
									{{ config('tasks.stars')[$task->difficulty] }}
								</td>
								<td>
									<a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
										{{ $task->title }}
									</a>
								</td>
								<td class="text-center">
									{{ $task->updated_at }}
								</td>
								<td class="text-center">
									<form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('@lang('words.buttons.delete_confirm', ['title' => $task->title])');">
											@lang('words.buttons.delete')
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $unapproved_tasks->appends(request()->input())->links() }}
				</div>
			</div>
		@else
			<div class="row text-center">
				<h1 style="color:lightgray;">@lang('words.notices.no_unapproved_tasks', ['name' => $user->name])</h1>
			</div>
		@endif
		<hr>
	@endif
	<ol class="breadcrumb">
		<li>
			<a href="{{ route('users.show', ['user' => $user->id]) }}">
				<i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.your_profile')
			</a>
		</li>
		<li class="active">
			<i class="fas fa-code"></i>&thinsp;@lang('words.titles.created_tasks', ['name' => $user->name])
		</li>
	</ol>
</div>
@endsection
