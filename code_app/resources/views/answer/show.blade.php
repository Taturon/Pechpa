@extends('layouts.app')
@section('title', $answer->task->title)
@section('content')
	<div id="content" class="col-md-12">
		@component('components.answers_show', ['answer' => $answer])
		@endcomponent
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('answers.index') }}">
					<i class="fas fa-tasks"></i>&thinsp;@lang('words.titles.answers_list')
				</a>
			</li>
			<li>
				<a href="{{ route('tasks.show', ['task' => $answer->task->id]) }}">{{ $answer->task->title }}</a>
			</li>
			<li class="active">{{ $answer->created_at }}</li>
		</ol>
	</div>
@endsection
