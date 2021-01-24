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
					<i class="fas fa-list"></i>&thinsp;@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.approved') }}">
					<i class="fas fa-code"></i>&thinsp;@lang('words.titles.approved_tasks_list')
				</a>
			</li>
			<li class="active">
				<i class="fas fa-code"></i>&thinsp;@lang('words.titles.approved_tasks')&thinsp;:&thinsp;{{ $task->title }}
			</li>
		</ol>
	</div>
@endsection
