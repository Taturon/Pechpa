@extends('layouts.app')
@section('title', $answer->task->title)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
				<h1>
					<b>{{ $answer->task->title }}</b>
					<br>
					<small>
						<b>
							@lang('title.task_rank')
							<span style="color:{{ config('tasks.colors')[$answer->task->difficulty] }};">
								{{ config('tasks.stars')[$answer->task->difficulty] }}
							</span>
						</b>
					</small>
				</h1>
			</div>
			@component('components.alert')
			@endcomponent
			<div class="row">
				<div class="col-md-4">
					<h2>
						<b>
							@lang('title.answer_date')
							<small>{{ $answer->created_at }}</small>
						</b>
					</h2>
				</div>
				<div class="col-md-4">
					<h2>
						<b>
							@lang('title.answer_judge')
							<small>
								<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $answer->judge }}</span>
							</small>
						</b>
					</h2>
				</div>
				<div class="col-md-4">
					<h2>
						<b>
							@lang('title.answer_byte')
							<small>{{ $answer->byte }}&thinsp;Byte</small>
						</b>
					</h2>
				</div>
			</div>
			<hr>
			<h2><b>@lang('title.answer_code')</b></h2>
			<pre><code>{{ $answer->answer_code }}</code></pre>
			<hr>
			<h2><b>@lang('title.answer_compile')</b></h2>
			<pre><code>{{ $answer->compile_message }}</code></pre>
			<hr>
			<h2><b>@lang('title.answer_testings')</b></h2>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th style="width:50%;">
								<div class="text-center">@lang('th.test_number')</div>
							</th>
							<th style="width:50%;">
								<div class="text-center">@lang('th.test_judge')</div>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($testings as $k => $testing)
							<tr>
								<td>
									<div class="text-center">{{ ++$k }}</div>
								</td>
								<td>
									<div class="text-center">
										<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $testing->judge }}</span>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr>
			<ol class="breadcrumb">
				<li><a href="{{ route('answers.index') }}">@lang('title.answers_list')</a></li>
				<li class="active">{{ $answer->task->title }}&thinsp;:&thinsp;{{ $answer->created_at }}</li>
			</ol>
		</div>
	</div>
</div>
@endsection
