@extends('layouts.app')
@section('title', __('words.titles.profile', ['name' => $user->name]))
@section('content')
<div class="row">
	<div id="content" class="col-md-12">
		<div id="page-header" class="page-header">
			<h1 class="text-center">@lang('words.titles.profile', ['name' => $user->name])</h1>
		</div>
		@component('components.alert')
		@endcomponent
		<div class="row">
			<div class="text-center">
				<div class="col-md-12 text-center">
					<img src="{{ asset('storage/icons/' . $user->icon) }}" width="150px" height="150px">
					@if ($user->id === Auth::user()->id)
						<p id="edit-link">
							<a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}">
								@lang('words.buttons.edit')
							</a>
						</p>
					@endif
				</div>
				<div class="col-md-10 col-md-offset-1 text-center">
					<div class="table-responsive">
						<table class="table table-hover ">
							<tr>
								<th class="text-right">
									<h2>@lang('words.users.registered_date')</h2>
								</th>
								<td>
									<h2>{{ $user->created_at }}</h2>
								</td>
							</tr>
							<tr>
								<th class="text-right">
									<h2>@lang('words.users.name')</h2>
								</th>
								<td>
									<h2>
										{{ $user->name }}
										@if ($user->id === Auth::user()->id)
											<span id="edit-link">
												<a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}">
													@lang('words.buttons.edit')
												</a>
											</span>
										@endif
									</h2>
								</td>
							</tr>
							@if ($user->id === Auth::user()->id)
								<tr>
									<th class="text-right">
										<h2>@lang('words.users.email')</h2>
									</th>
									<td>
										<h2>{{ $user->email }}</h2>
									</td>
								</tr>
							@endif
							<tr>
								<th class="text-right">
									<h2>@lang('words.users.approved_tasks_count')</h2>
								</th>
								<td>
									<h2>{{ $statics['approved_tasks'] }}</h2>
								</td>
							</tr>
							<tr>
								<th class="text-right">
									<h2>@lang('words.users.correct_answers_count')&thinsp;/&thinsp;@lang('words.users.all_answers_count')</h2>
								</th>
								<td>
									<h2>{{ $statics['correct_answers'] }}&thinsp;/&thinsp;{{ $statics['all_answers'] }}</h2>
								</td>
							</tr>
							<tr>
								<th class="text-right">
									<h2>@lang('words.users.correct_answer_rate')</h2>
								</th>
								<td>
									<h2>{{ $statics['correct_rate'] }}</h2>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</div>
@endsection
