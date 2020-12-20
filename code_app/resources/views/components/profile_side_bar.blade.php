<div class="col-md-3 hidden-xs hidden-sm">
	<div id="side-bar-wrapper" class="text-center">
		<div id="side-bar-block">
			<p>
				<img class="img-rounded" src="{{ asset('storage/icons/' . Auth::user()->icon) }}" width="100px" height="100px">
			</p>
			<big>{{ Auth::user()->name }}</big>
			<hr id="inner-bar">
			<div class="row">
				<div class="col-md-6 text-right">
					@lang('words.users.all_answers_count')
				</div>
				<div class="col-md-6 text-left">
					{{ isset(Auth::user()->answer) ? Auth::user()->answer->count() : 0 }}
				</div>
				<div class="col-md-6 text-right">
					@lang('words.users.correct_answers_count')
				</div>
				<div class="col-md-6 text-left">
					{{ isset(Auth::user()->answer) ? Auth::user()->answer->where('judge', 'AC')->count() : 0 }}
				</div>
				<div class="col-md-6 text-right">
					@lang('words.users.approved_tasks_count')
				</div>
				<div class="col-md-6 text-left">
					{{ isset(Auth::user()->task) ? Auth::user()->task->whereNotNull('reviewed_at')->count() : 0 }}
				</div>
			</div>
		</div>
		<div id="side-bar-block">
			<big>@lang('words.users.recent_answers')</big>
			<hr id="inner-bar">
			@if (Auth::user()->answer)
				@foreach (Auth::user()->answer->orderBy('created_at', 'desc')->take(3)->get() as $answer)
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
			@if (Auth::user()->task)
				@foreach (Auth::user()->task->orderBy('created_at', 'desc')->take(3)->get() as $task)
					<div id="side-bar-inner-block" class="row">
						<div class="col-md-12">
							<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
								{{ config('tasks.stars')[$task->difficulty] }}
							</span>
							<br>
							<span>{{ $task->title }}</span>
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
