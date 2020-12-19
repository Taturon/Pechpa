@extends('layouts.app')
@section('header')
<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('title', $task->title)
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
			<h1>
				<b>{{ $task->title }}</b>
			</h1>
			<div class="row">
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
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
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.solved')&#65306;</small>
							<span>{{ $task->solved }}</span>
						</b>
					</h2>
				</div>
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.examinees')&#65306;</small>
							<span>{{ $task->examinees }}</span>
						</b>
					</h2>
				</div>
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
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
		<h2><b>@lang('words.tasks.statement')</b></h2>
		<p>{!! nl2br(e($task->statement)) !!}</p>
		<h2><b>@lang('words.tasks.constraints')</b></h2>
		<p>{{ $task->constraints }}</p>
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
		@if (Auth::user()->id !== $task->user_id)
			{{ Form::open(['route' => ['answers.check', $task->id]]) }}
				{{ Form::textarea('source', "&lt;?php\n", ['rows' => 15, 'style' => 'width:100%;', 'id' => 'tab']) }}
				<hr>
				<button class="btn btn-block btn-primary" name="submission" type="submit" onclick="return confirm('@lang('words.buttons.submission_confirm')');">
					@lang('words.buttons.submission')
				</button>
			{{ Form::close() }}
		@else
			<div class="row text-center">
				<h1 style="color:lightgray;">@lang('words.notices.can_not_answer')</h1>
			</div>
		@endif
		<hr>
		<ol class="breadcrumb">
			<li><a href="{{ route('tasks.index') }}"><i class="fas fa-code"></i>&thinsp;@lang('words.titles.tasks_list')</a></li>
			<li class="active">{{ $task->title }}</li>
		</ol>
	</div>
</div>
@endsection
