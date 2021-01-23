<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.answers.answer_date')</div>
				</th>
				<th style="width:55%;">
					<div class="text-center">@lang('words.tasks.title')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.answers.answerer')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.answers.judge')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($answers as $answer)
				<tr>
					<td class="text-center">
						<a href="{{ route('admin.answers.show', ['answer' => $answer->id]) }}">{{ $answer->created_at }}</a>
					</td>
					<td>
						<a href="{{ route('admin.tasks.show', ['task' => $answer->task->id]) }}">{{ $answer->task->title }}</a>
					</td>
					<td class="text-center">
						<a href="{{ route('admin.users.show', ['user' => $answer->user->id]) }}">
							<img src="{{ asset('storage/icons/' . $answer->user->icon) }}" width="20px" height="20px">
							{{ $answer->user->name }}
						</a>
					</td>
					<td>
						<div class="text-center">
							<span class="label label-{{ $answer->judge === 'AC' ? 'success' : 'warning' }}">{{ $answer->judge }}</span>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@if (method_exists($answers, 'links'))
	<div class="text-center">
		{{ $answers->links() }}
	</div>
@endif
