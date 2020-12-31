@extends('layouts.app')
@section('title', __('words.titles.task_edit_or_approve'))
@section('header')
	<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('content')
	@component('components.alert')
	@endcomponent
	<div id="content" class="col-md-12 form-panel">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>@lang('words.titles.task_edit_or_approve')</h1></div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('admin.tasks.update', ['task_id' => $task->id]) }}">
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
							<button name="update" type="submit" class="btn btn-block btn-primary" onclick="return confirm('@lang('words.buttons.update_only_confirm')');">
								@lang('words.buttons.update_only')
							</button>
							<br>
							<button name="approval" type="submit" class="btn btn-block btn-primary" onclick="return confirm('@lang('words.buttons.approval_confirm')');">
								@lang('words.buttons.approval')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.unapproved') }}">
					@lang('words.titles.unapproved_tasks_list')
				</a>
			</li>
			<li class="active">
				@lang('words.titles.task_edit_or_approve')&thinsp;:&thinsp;{{ $task->title }}
			</li>
		</ol>
	</div>
@endsection
