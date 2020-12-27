<div class="col-md-3 hidden-xs hidden-sm hidden-md">
	<div id="side-bar-wrapper" class="text-center">
		<div id="side-bar-block">
			<p>
				<img class="img-rounded" src="{{ asset('storage/icons/' . Auth::user()->icon) }}" width="100px" height="100px">
			</p>
			<big>{{ Auth::user()->name }}</big>
			<hr id="inner-bar">
			<div class="row">
				<div class="col-md-7 text-right">
					@lang('words.users.all_answers_count')
				</div>
				<div class="col-md-5 text-left">
					{{ Auth::user()->answers()->count() }}
				</div>
				<div class="col-md-7 text-right">
					@lang('words.users.correct_answers_count')
				</div>
				<div class="col-md-5 text-left">
					{{ Auth::user()->answers()->where('judge', 'AC')->count() }}
				</div>
				<div class="col-md-7 text-right">
					@lang('words.users.unapproved_tasks_count')
				</div>
				<div class="col-md-5 text-left">
					{{ Auth::user()->tasks()->whereNull('reviewed_at')->count() }}
				</div>
				<div class="col-md-7 text-right">
					@lang('words.users.approved_tasks_count')
				</div>
				<div class="col-md-5 text-left">
					{{ Auth::user()->tasks()->whereNotNull('reviewed_at')->count() }}
				</div>
			</div>
		</div>
		<div id="side-bar-block">
			<big>@lang('words.users.recent_answers')</big>
			<hr id="inner-bar">
			@if (Auth::user()->answers()->count() > 0)
				@foreach (Auth::user()->answers()->orderBy('created_at', 'desc')->take(3)->get() as $answer)
					<div id="side-bar-inner-block" class="row">
						<div class="col-md-12">
							<span style="color:{{ config('tasks.colors')[$answer->task->difficulty] }};">
								{{ config('tasks.stars')[$answer->task->difficulty] }}
							</span>
							<br>
							<span>{{ $answer->task->title }}</span>
							<br>
							<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $answer->judge }}</span>
						</div>
					</div>
					<hr id="inner-bar">
				@endforeach
			@else
				<div class="row text-center">
					<p id="notice-block">@lang('words.notices.no_answers')</p>
				</div>
			@endif
		</div>
		<div id="side-bar-block">
			<big>@lang('words.users.recent_tasks')</big>
			<hr id="inner-bar">
			@if (Auth::user()->tasks()->count() > 0)
				@foreach (Auth::user()->tasks()->orderBy('updated_at', 'desc')->take(3)->get() as $task)
					<div id="side-bar-inner-block" class="row">
						<div class="col-md-12">
							<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
								{{ config('tasks.stars')[$task->difficulty] }}
							</span>
							<br>
							<span>{{ $task->title }}</span>
							<br>
							@if (is_null($task->reviewed_at))
								<span class="label label-default">@lang('words.users.unapproved')</span>
							@else
								<span class="label label-primary">@lang('words.users.approved')</span>
							@endif
						</div>
					</div>
					<hr id="inner-bar">
				@endforeach
			@else
				<div class="row text-center">
					<p id="notice-block">@lang('words.notices.no_created_tasks')</p>
				</div>
			@endif
		</div>
	</div>
</div>
