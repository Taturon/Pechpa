@extends('layouts.app')
@section('header')
<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('title', $task->title)
@section('content')
<div class="row">
	<div id="content" class="col-md-12">
		<div id="page-header" class="page-header">
			<h1>
				<b>{{ $task->title }}</b>
				<br>
				<small>
					<b>
						@lang('words.tasks.difficulty')
						<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
							{{ config('tasks.stars')[$task->difficulty] }}
						</span>
					</b>
				</small>
			</h1>
		</div>
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
		<h2 class="text-center">@lang('words.tasks.samples')</h2>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:50%;">
							<div class="text-center">@lang('words.tasks.sample_input')</div>
						</th>
						<th style="width:50%;">
							<div class="text-center">@lang('words.tasks.sample_output')</div>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($task->samples as $key => $sample)
						<tr>
							<td>
								<div>
									<pre>{{ $sample->input_code }}</pre>
								</div>
							</td>
							<td>
								<div>
									<pre>{{ $sample->output_code }}</pre>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<hr>
		<h2 class="text-center">@lang('words.tasks.tests')</h2>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:50%;">
							<div class="text-center">@lang('words.tasks.test_input')</div>
						</th>
						<th style="width:50%;">
							<div class="text-center">@lang('words.tasks.test_output')</div>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($task->tests as $test)
						<tr>
							<td>
								<div>
									<pre>{{ $test->input }}</pre>
								</div>
							</td>
							<td>
								<div>
									<pre>{{ $test->output }}</pre>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.approved') }}">
					@lang('words.titles.approved_tasks_list')
				</a>
			</li>
			<li class="active">
				@lang('words.titles.approved_tasks')&thinsp;:&thinsp;{{ $task->title }}
			</li>
		</ol>
	</div>
</div>
@endsection
