<div class="row">
	{{ Form::open(['route' => 'tasks.search', 'method' => 'post']) }}
		{{ csrf_field() }}
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('title', __('words.tasks.title')) }}
					{{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => __('words.tasks.title_search_placeholder')]) }}
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('difficulty') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('difficulty', __('words.tasks.difficulty')) }}
					<select id="difficulty" name="difficulty" class="form-control">
						<option value="">@lang('words.tasks.no_select')</option>
						@foreach (config('tasks.stars') as $k => $star)
							<option value="{{ $k }}">{{ $star }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('lower_validity') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('lower_validity', __('words.tasks.lower_validity')) }}
					<select id="lower_validity" name="lower_validity" class="form-control">
						<option value="">@lang('words.tasks.no_select')</option>
						@foreach (config('tasks.lower_validity') as $k => $validity)
							<option value="{{ $k }}">@lang('words.tasks.validity.lower.' . $validity)</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('upper_validity') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('upper_validity', __('words.tasks.upper_validity')) }}
					<select id="upper_validity" name="upper_validity" class="form-control">
						<option value="">@lang('words.tasks.no_select')</option>
						@foreach (config('tasks.upper_validity') as $k => $validity)
							<option value="{{ $k }}">@lang('words.tasks.validity.upper.' . $validity)</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<div class="text-center">
					{{ Form::label('include_no_examinees', __('words.tasks.include_no_examinees')) }}
					<p>
						{{ Form::checkbox('include_no_examinees', '', '', ['style' => 'margin-top:0.6em;transform:scale(2.0);']) }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<button class="btn btn-primary btn-block" type="submit" name="type" value="search" style="margin-bottom:10px;">
				@lang('words.buttons.search')
			</button>
		</div>
	{{ Form::close() }}
</div>
