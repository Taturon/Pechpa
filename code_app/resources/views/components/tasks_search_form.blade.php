<div class="row">
	{{ Form::open(['route' => 'admin.tasks.index', 'method' => 'post']) }}
		{{ csrf_field() }}
		<div class="col-md-4">
			<div class="form-group">
				{{ Form::label('title', __('words.tasks.title')) }}
				{{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => __('words.tasks.title_search_placeholder')]) }}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				{{ Form::label('difficulty', __('words.tasks.difficulty')) }}
				{{ Form::select('difficulty', config('tasks.stars'), '', ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				{{ Form::label('lower_validity', __('words.tasks.lower_validity')) }}
				<select name="validity" class="form-control">
					@foreach (config('tasks.lower_validity') as $k => $validity)
						<option value="{{ $k }}">@lang('words.tasks.validity.lower.' . $validity)</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				{{ Form::label('upper_validity', __('words.tasks.upper_validity')) }}
				<select name="validity" class="form-control">
					@foreach (config('tasks.upper_validity') as $k => $validity)
						<option value="{{ $k }}">@lang('words.tasks.validity.upper.' . $validity)</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				{{ Form::label('no_examinees', __('words.tasks.include_no_examinees')) }}
				{{ Form::checkbox('no_examinees', '', '', ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-12">
			<button class="btn btn-primary btn-block" type="submit" name="type" value="search" style="margin-bottom:10px;">
				@lang('words.buttons.search')
			</button>
		</div>
	{{ Form::close() }}
</div>
