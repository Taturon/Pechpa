@extends('layouts.app')
@section('title', __('words.titles.answers_list'))
@section('side_bar')
	@component('components.profile_side_bar')
	@endcomponent
@endsection
@section('content')
<div id="content" class="col-md-9">
	<div id="page-header" class="page-header">
		<h1 class="text-center">@lang('words.titles.answers_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($answers) > 0)
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:20%;">
							<div class="text-center">@lang('words.answers.answer_date')</div>
						</th>
						<th style="width:55%;">
							<div class="text-center">@lang('words.tasks.title')</div>
						</th>
						<th style="width:15%;">
							<div class="text-center">@lang('words.tasks.difficulty')</div>
						</th>
						<th style="width:10%;">
							<div class="text-center">@lang('words.answers.judge')</div>
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
		</div>
		<div class="text-center">
			{{ $answers->links() }}
		</div>
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_answers')</h1>
		</div>
		<hr>
	@endif
</div>
@endsection
