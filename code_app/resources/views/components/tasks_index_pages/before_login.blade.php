<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.difficulty')</div>
				</th>
				<th style="width:55%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.creator')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.validity.validity')</div>
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
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center">
	{{ $tasks->appends(request()->input())->links() }}
</div>
