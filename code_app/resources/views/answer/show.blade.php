@extends('layouts.app')
@section('title', $answer->task->title)
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
			<h1>
				<b>{{ $answer->task->title }}</b>
			</h1>
			<div class="row">
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.difficulty')&#65306;
							<span style="color:{{ config('tasks.colors')[$answer->task->difficulty] }};">
								{{ config('tasks.stars')[$answer->task->difficulty] }}
							</span>
							</small>
						</b>
					</h2>
				</div>
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.solved')&#65306;</small>
							<span>{{ $answer->task->solved }}</span>
						</b>
					</h2>
				</div>
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.examinees')&#65306;</small>
							<span>{{ $answer->task->examinees }}</span>
						</b>
					</h2>
				</div>
				<div class="col-md-3" style="margin-top:-25px;padding-bottom:0px;">
					<h2>
						<b>
							<small>@lang('words.tasks.validity.validity')&#65306;</small>
							<span>
								{{ $answer->task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $answer->task->solved / $answer->task->examinees * 100) . '%' }}
							</span>
						</b>
					</h2>
				</div>
			</div>
		</div>
		@component('components.alert')
		@endcomponent
		<div class="row">
			<div class="col-md-4">
				<h2>
					<b>
						@lang('words.answers.answer_date')
						<small>{{ $answer->created_at }}</small>
					</b>
				</h2>
			</div>
			<div class="col-md-4">
				<h2>
					<b>
						@lang('words.answers.judge')
						<small>
							<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $answer->judge }}</span>
						</small>
					</b>
				</h2>
			</div>
			<div class="col-md-4">
				<h2>
					<b>
						@lang('words.answers.byte')
						<small>{{ $answer->byte }}&thinsp;Byte</small>
					</b>
				</h2>
			</div>
		</div>
		<hr>
		<h2><b>@lang('words.answers.code')</b></h2>
		<pre><code>{{ $answer->answer_code }}</code></pre>
		<hr>
		<h2><b>@lang('words.answers.compile')</b></h2>
		<pre><code>{{ $answer->compile_message }}</code></pre>
		<hr>
		<h2><b>@lang('words.answers.testings')</b></h2>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:50%;">
							<div class="text-center">@lang('words.answers.test_number')</div>
						</th>
						<th style="width:50%;">
							<div class="text-center">@lang('words.answers.judge')</div>
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
			<li><a href="{{ route('tasks.index') }}">@lang('words.titles.tasks_list')</a></li>
			<li><a href="{{ route('answers.index') }}">@lang('words.titles.answers_list')</a></li>
			<li class="active">{{ $answer->task->title }}&thinsp;:&thinsp;{{ $answer->created_at }}</li>
		</ol>
	</div>
</div>
@endsection
