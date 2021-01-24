@extends('layouts.app')
@section('header')
	<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('title', $task->title)
@section('content')
	<div id="content" class="col-md-12">
		@component('components.tasks_show', ['task' => $task])
		@endcomponent
		<hr>
		@foreach ($task->samples as $key => $sample)
			<h3><b>@lang('words.tasks.sample_input')&thinsp;{{ $key + 1 }}</b></h3>
			<pre><code>{{ $sample->input_code }}</code></pre>
			<h3><b>@lang('words.tasks.sample_output')&thinsp;{{ $key + 1 }}</b></h3>
			<pre><code>{{ $sample->output_code }}</code></pre>
			<hr>
		@endforeach
		<h2><b>@lang('words.answers.answer')</b></h2>
		@if (Auth::user()->id == $task->user_id)
			<div class="row text-center">
				<h1 id="notice-block">@lang('words.notices.can_not_self_answer')</h1>
			</div>
		@elseif (Auth::user()->answers()->where('task_id', $task->id)->where('judge', 'AC')->count() > 0)
			<div class="row text-center">
				<h1 id="notice-block">@lang('words.notices.can_not_duplicate_answer')</h1>
			</div>
		@else
			{{ Form::open(['route' => ['answers.check', $task->id]]) }}
				{{ Form::textarea('source', "&lt;?php\n", ['rows' => 15, 'style' => 'width:100%;', 'id' => 'tab']) }}
				<hr>
				<button class="btn btn-block btn-primary btn-lg" name="submission" type="submit" onclick="return confirm('@lang('words.buttons.submission_confirm')');">
					@lang('words.buttons.submission')
				</button>
			{{ Form::close() }}
		@endif
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('tasks.index') }}">
					<i class="fas fa-code"></i>&thinsp;@lang('words.titles.tasks_list')
				</a>
			</li>
			<li class="active">{{ $task->title }}</li>
		</ol>
	</div>
@endsection
