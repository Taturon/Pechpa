@extends('layouts.app')
@section('title', __('words.titles.task_edit'))
@section('header')
	<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('content')
@component('components.alert')
@endcomponent
<div class="row">
	<div id="content" class="col-md-12 form-panel">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>@lang('words.titles.task_edit')</h1></div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					@component('components.task_edit_form.basic', ['task' => $task])
					@endcomponent
					@component('components.task_edit_form.sample_cases', ['task' => $task])
					@endcomponent
					@component('components.task_edit_form.test_cases', ['task' => $task])
					@endcomponent
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<button name="update" type="submit" class="btn btn-block btn-primary" onclick="return confirm('@lang('words.buttons.update_confirm')');">
								@lang('words.buttons.update')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('users.show', ['user' => $task->user->id]) }}">
					<i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.your_profile')
				</a>
			</li>
			<li>
				<a href="{{ route('users.tasks', ['user' => $task->user->id]) }}">
					<i class="fas fa-code"></i>&thinsp;@lang('words.titles.created_tasks', ['name' => $task->user->name])
				</a>
			</li>
			<li class="active"><i class="fas fa-code"></i>&thinsp;@lang('words.titles.task_edit')</li>
		</ol>
	</div>
</div>
@endsection
