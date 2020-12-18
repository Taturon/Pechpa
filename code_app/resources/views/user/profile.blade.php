@extends('layouts.app')
@section('title', __('words.titles.user_profile'))
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
			<h1>@lang('words.titles.user_profile')</h1>
		</div>
		<div class="row">
				<div class="text-center">
					<h2>
						<img src="{{ asset('storage/icons/' . Auth::user()->icon) }}" width="150px" height="150px">
					</h2>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.registered_date')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ Auth::user()->created_at }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.name')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ Auth::user()->name }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.email')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ Auth::user()->email }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.approved_tasks_count')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ $statics['approved_tasks'] }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.correct_answers_count')&thinsp;/&thinsp;@lang('words.users.all_answers_count')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ $statics['correct_answers'] }}&thinsp;/&thinsp;{{ $statics['all_answers'] }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.correct_answer_rate')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ $statics['correct_answer_rate'] }}</h2>
				</div>
			</div>
		</div>
		<hr>
		<ol class="breadcrumb">
			<li><a href="{{ route('tasks.index') }}">@lang('words.titles.tasks_list')</a></li>
			<li><a href="{{ route('answers.index') }}">@lang('words.titles.answers_list')</a></li>
			<li class="active">@lang('words.titles.user_profile')</li>
		</ol>
	</div>
</div>
@endsection
