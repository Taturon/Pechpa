@extends('layouts.app')
@section('header')
	<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('title', $task->title)
@section('content')
	<div id="content" class="col-md-12">
		<div id="page-header" class="page-header">
			<h1>
				<b>{{ $task->title }}</b>
			</h1>
			<div class="row">
				<div id="page-header-h2" class="col-md-3">
					<h2>
						<b>
							<small>@lang('words.tasks.difficulty')&#65306;
							<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
								{{ config('tasks.stars')[$task->difficulty] }}
							</span>
							</small>
						</b>
					</h2>
				</div>
				<div id="page-header-h2" class="col-md-3">
					<h2>
						<b>
							<small>@lang('words.tasks.solved')&#65306;</small>
							<span>{{ $task->solved }}</span>
						</b>
					</h2>
				</div>
				<div id="page-header-h2" class="col-md-3">
					<h2>
						<b>
							<small>@lang('words.tasks.examinees')&#65306;</small>
							<span>{{ $task->examinees }}</span>
						</b>
					</h2>
				</div>
				<div id="page-header-h2" class="col-md-3">
					<h2>
						<b>
							<small>@lang('words.tasks.validity.validity')&#65306;</small>
							<span>
								{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
							</span>
						</b>
					</h2>
				</div>
			</div>
		</div>
		@component('components.alert')
		@endcomponent
		<h2><b>@lang('words.tasks.statement')</b></h2>
		<p>{!! nl2br(e($task->statement)) !!}</p>
		<h2><b>@lang('words.tasks.constraints')</b></h2>
		<p>{!! nl2br(e($task->constraints)) !!}</p>
		<h2><b>@lang('words.tasks.input')</b></h2>
		<p>{{ $task->input }}</p>
		<pre><code>{{ $task->input_code }}</code></pre>
		<h2><b>@lang('words.tasks.output')</b></h2>
		<p>{{ $task->output }}</p>
		@isset($task->output_code)
			<pre><code>{{ $task->output_code }}</code></pre>
		@endisset
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
				<button class="btn btn-block btn-primary" name="submission" type="submit" onclick="return confirm('@lang('words.buttons.submission_confirm')');">
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
