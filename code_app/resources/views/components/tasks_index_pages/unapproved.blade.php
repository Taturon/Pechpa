<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.difficulty')</div>
				</th>
				<th style="width:50%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.tasks.created_and_updated_date')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.creator')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.buttons.delete')</div>
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
						<a href="{{ route('admin.tasks.edit', ['id' => $task->id]) }}">
							{{ $task->title }}
						</a>
					</td>
					<td class="text-center">
						{{ $task->updated_at }}
					</td>
					<td class="text-center">
						<a href="{{ route('admin.users.show', ['user' => $task->user->id]) }}">
							<img src="{{ asset('storage/icons/' . $task->user->icon) }}" width="20px" height="20px">
							{{ $task->user->name }}
						</a>
					</td>
					<td class="text-center">
						<form method="POST" action="{{ route('admin.tasks.destroy', ['task' => $task->id]) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('@lang('words.buttons.delete_confirm', ['title' => $task->title])');">
								@lang('words.buttons.delete')
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
