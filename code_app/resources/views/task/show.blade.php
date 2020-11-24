@extends('layouts.app')
@section('header')
<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('title', $task->title)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
				<h1>
					{{ $task->title }}
					<br>
					<small>
						@lang('title.task_rank')
						<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
							{{ config('tasks.stars')[$task->difficulty] }}
						</span>
					</small>
				</h1>
			</div>
			<h2>@lang('title.task_statement')</h2>
			<p>{!! nl2br(e($task->statement)) !!}</p>
			<h2>@lang('title.task_input')</h2>
			<p>{{ $task->input }}</p>
			<pre><code>{{ $task->input_code }}</code></pre>
			<h2>@lang('title.task_output')</h2>
			<p>{{ $task->output }}</p>
			@isset($task->output_code)
				<pre><code>{{ $task->output_code }}</code></pre>
			@endisset
			<hr>
			@foreach ($task->samples as $key => $sample)
			<h2>@lang('title.sample_input')&thinsp;{{ $key + 1 }}</h2>
			<pre><code>{{ $sample->input_code }}</code></pre>
			<h2>@lang('title.sample_output')&thinsp;{{ $key + 1 }}</h2>
			<pre><code>{{ $sample->output_code }}</code></pre>
			@endforeach
			<hr>
			<h2>@lang('title.task_answer')</h2>
			{{ Form::open(['route' => ['answers.check', $task->id]]) }}
				{{ Form::textarea('source', "&lt;?php\n", ['rows' => 15, 'style' => 'width:100%;', 'id' => 'tab']) }}
				<hr>
				{{ Form::submit(__('button.submission'), ['name' => 'submission', 'class' => 'btn btn-block btn-primary', 'onfocus' => 'this.blur();']) }}
			{{ Form::close() }}
			<hr>
			<ol class="breadcrumb">
				<li><a href="{{ route('tasks.index') }}">@lang('title.tasks_list')</a></li>
				<li class="active">{{ $task->title }}</li>
			</ol>
		</div>
	</div>
</div>
@endsection
