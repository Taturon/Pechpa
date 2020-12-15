@extends('layouts.app')
@section('title', __('title.answers_list'))
@section('content')
<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	<h1><small>@lang('title.answers_list')</small></h1>
</div>
@component('components.alert')
@endcomponent
@if (count($answers) > 0)
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th style="width:15%;">
						<div class="text-center">@lang('th.submission_datetime')</div>
					</th>
					<th style="width:65%;">
						<div class="text-center">@lang('th.task_title')</div>
					</th>
					<th style="width:10%;">
						<div class="text-center">@lang('th.task_difficulty')</div>
					</th>
					<th style="width:10%;">
						<div class="text-center">@lang('th.judge')</div>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($answers as $answer)
					<tr>
						<td>
							<a href="{{ route('answers.show', ['answer' => $answer->id]) }}">{{ $answer->created_at }}</a>
						</td>
						<td>
							<a href="{{ route('tasks.show', ['task' => $answer->task->id]) }}">{{ $answer->task->title }}</a>
						</td>
						<td style="color:{{ config('tasks.colors')[$answer->task->difficulty] }};">
							{{ config('tasks.stars')[$answer->task->difficulty] }}
						</td>
						<td>
							<div class="text-center">
								<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $answer->judge }}</span>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{ $answers->links() }}
		</div>
	</div>
@else
	<div class="row text-center">
		<h1 style="color:lightgray;">@lang('words.notices.no_answers')</h1>
	</div>
	<hr>
@endif
<ol class="breadcrumb">
	<li><a href="{{ route('tasks.index') }}">@lang('words.titles.tasks_list')</a></li>
	<li class="active">@lang('words.titles.answers_list')</li>
</ol>
@endsection
