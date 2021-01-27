<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.difficulty')</div>
				</th>
				<th style="width:40%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.creator')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.validity.validity')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.your_answer')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td style="color:{{ config('tasks.colors')[$task->difficulty] }};">
						{{ config('tasks.stars')[$task->difficulty] }}
					</td>
					<td>
						<a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
					</td>
					<td class="text-center">
						<a href="{{ route('users.show', ['user' => $task->user->id]) }}">
							<img src="{{ asset('storage/icons/' . $task->user->icon) }}" width="20px" height="20px">
							{{ $task->user->name }}
						</a>
					</td>
					<td class="text-center">
						{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
					</td>
					<td class="text-center">
						@if (Auth::user()->answers()->where('task_id', $task->id)->count() > 0)
							<span class="label label-{{ Auth::user()->answers()->where('task_id', $task->id)->orderBy('created_at', 'desc')->first()->judge === 'AC' ? 'success' : 'warning' }}">
								{{ Auth::user()->answers()->where('task_id', $task->id)->orderBy('created_at', 'desc')->first()->judge }}
							</span>
						@elseif (Auth::user()->id === $task->user_id)
							<span class="label label-default">
								@lang('words.notices.can_not_answer')
							</span>
						@else
							<span class="label label-info">
								@lang('words.notices.no_your_answer')
							</span>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center">
	{{ $tasks->appends(request()->input())->links() }}
</div>
