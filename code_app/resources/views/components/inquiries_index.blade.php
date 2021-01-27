<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th style="width:15%;">
					<div class="text-center">@lang('words.inquiries.inquired_date')</div>
				</th>
				<th style="width:20%;">
					<div class="text-center">@lang('words.inquiries.categories')</div>
				</th>
				<th style="width:50%;">
					<div class="text-center">@lang('words.inquiries.title')</div>
				</th>
				<th style="width:15%;">
					<div class="text-center">@lang('words.inquiries.user_name')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($inquiries as $inquiry)
				<tr>
					<td class="text-center">
						{{ $inquiry->created_at }}
					</td>
					<td class="text-center">
						@lang(config('configs.inquiries.categories')[$inquiry->category])
					</td>
					<td>
						<a href="{{ route('admin.inquiries.show', ['inquiry' => $inquiry->id]) }}">
							{{ $inquiry->title }}
						</a>
					</td>
					<td class="text-center">
						<a href="{{ route('admin.users.show', ['user' => $inquiry->user->id]) }}">
							<img src="{{ asset('storage/icons/' . $inquiry->user->icon) }}" width="20px" height="20px">
							{{ $inquiry->user->name }}
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@if (method_exists($inquiries, 'links'))
		<div class="text-center">
			{{ $inquiries->links() }}
		</div>
	@endif
</div>
