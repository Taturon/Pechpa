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
					<div class="text-center">@lang('words.tasks.published_date')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.validity.validity')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.tasks.creator')</div>
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
						<a href="{{ route('admin.tasks.show', ['task' => $task->id]) }}">
							{{ $task->title }}
						</a>
					</td>
					<td class="text-center">
						{{ $task->reviewed_at }}
					</td>
					<td class="text-center">
						{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
					</td>
					<td class="text-center">
						<img src="{{ asset('storage/icons/' . $task->user->icon) }}" width="20px" height="20px">
						{{ $task->user->name }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
