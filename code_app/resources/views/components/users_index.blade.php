<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.users.registered_date')</div>
				</th>
				<th style="width:30%;">
					<div class="text-center">@lang('words.users.name')</div>
				</th>
				<th style="width:35%;">
					<div class="text-center">@lang('words.users.email')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.users.all_answers_count')</div>
				</th>
				<th style="width:10%;">
					<div class="text-center">@lang('words.users.created_tasks_count')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td class="text-center">
						{{ $user->created_at }}
					</td>
					<td>
						<a href="{{ route('admin.users.show', ['user' => $user->id]) }}">
							<img src="{{ asset('storage/icons/' . $user->icon) }}" width="20px" height="20px">
							{{ $user->name }}
						</a>
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td class="text-center">
						{{ $user->answers->count() }}
					</td>
					<td class="text-center">
						{{ $user->tasks->count() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@if (method_exists($users, 'links'))
	<div class="text-center">
		{{ $users->links() }}
	</div>
@endif
