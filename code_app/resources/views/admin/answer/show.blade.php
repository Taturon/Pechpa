@extends('layouts.app')
@section('title', $answer->task->title)
@section('content')
	<div id="content" class="col-md-12">
		@component('components.answers_show', ['answer' => $answer])
		@endcomponent
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					<i class="fas fa-list"></i>&thinsp;@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.answers.index') }}">
					<i class="fas fa-tasks"></i>&thinsp;@lang('words.titles.answers_list')
				</a>
			</li>
			<li class="active">
				<i class="fas fa-tasks"></i>&thinsp;{{ $answer->task->title }}&thinsp;:&thinsp;{{ $answer->created_at }}
			</li>
		</ol>
	</div>
@endsection
