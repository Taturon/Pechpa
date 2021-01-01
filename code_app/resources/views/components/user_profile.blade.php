<div class="row">
	<div class="text-center">
		<div class="col-md-12 text-center">
			<p>
				<img src="{{ asset('storage/icons/' . $user->icon) }}" width="150px" height="150px">
			</p>
			@if (Auth::guard('user')->check() && $user->id === Auth::user()->id)
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
					@if (Auth::guard('user')->check() && $user->id === Auth::user()->id && $user->id !== 1 || Auth::guard('admin')->check())
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
							<h2>@lang('words.users.all_answers_count')</h2>
						</th>
						<td>
							<h2>{{ $statics['all_answers'] }}</h2>
						</td>
					</tr>
					<tr>
						<th class="text-right">
							<h2>@lang('words.users.correct_answers_count')</h2>
						</th>
						<td>
							<h2>{{ $statics['correct_answers'] }}</h2>
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
					<tr>
						<th class="text-right">
							<h2>@lang('words.users.unapproved_tasks_count')</h2>
						</th>
						<td>
							<h2>{{ $statics['unapproved_tasks'] }}</h2>
						</td>
					</tr>
					<tr>
						<th class="text-right">
							<h2>@lang('words.users.approved_tasks_count')</h2>
						</th>
						<td>
							<h2>{{ $statics['approved_tasks'] }}</h2>
						</td>
					</tr>
					@if (Auth::guard('user')->check())
						<tr>
							<th class="text-center" colspan="2">
								<h3>
									<a href="{{ route('users.tasks', ['user_id' => $user->id]) }}">
										@lang('words.users.created_tasks')
									</a>
								</h3>
							</th>
						</tr>
					@endif
				</table>
			</div>
		</div>
	</div>
</div>
