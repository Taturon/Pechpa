@extends('layouts.app')
@section('title', __('words.titles.profile', ['name' => $user->name]))
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin-top:-20px;padding-bottom:0px;">
			<h1>@lang('words.titles.profile', ['name' => $user->name])</h1>
		</div>
		@component('components.alert')
		@endcomponent
		<div class="row">
			<div class="text-center">
				<div class="col-md-12 text-center">
					<img src="{{ asset('storage/icons/' . $user->icon) }}" width="150px" height="150px">
					@if ($user->id === Auth::user()->id)
						<p style="font-size:15px">
							<a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}">
								@lang('words.buttons.edit')
							</a>
						</p>
					@endif
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.registered_date')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>{{ $user->created_at }}</h2>
				</div>
				<div class="col-md-6 text-right">
					<h2>@lang('words.users.name')</h2>
				</div>
				<div class="col-md-6 text-left">
					<h2>
						{{ $user->name }}
						@if ($user->id === Auth::user()->id)
							<span style="font-size:15px">
								<a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}">
									@lang('words.buttons.edit')
								</a>
							</span>
						@endif
					</h2>
				</div>
				@if ($user->id === Auth::user()->id)
					<div class="col-md-6 text-right">
						<h2>@lang('words.users.email')</h2>
					</div>
					<div class="col-md-6 text-left">
						<h2>{{ $user->email }}</h2>
					</div>
				@endif
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
					<h2>{{ $statics['correct_rate'] }}</h2>
				</div>
			</div>
		</div>
		<hr>
	</div>
</div>
@endsection
