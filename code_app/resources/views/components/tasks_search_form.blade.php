<div class="row">
	{{ Form::open(['route' => 'tasks.index', 'method' => 'get']) }}
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
					{{ Form::select('difficulty', array_merge([__('words.tasks.no_select')], config('tasks.stars')), 0, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('lower_validity') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('lower_validity', __('words.tasks.lower_validity')) }}
					{{ Form::select('lower_validity', [
						0 => __('words.tasks.no_select'),
						1 => __('words.tasks.validity.lower', ['n' => 0]),
						2 => __('words.tasks.validity.lower', ['n' => 25]),
						3 => __('words.tasks.validity.lower', ['n' => 50]),
						4 => __('words.tasks.validity.lower', ['n' => 75]),
					], 0, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('upper_validity') ? ' has-error' : '' }}">
				<div class="text-center">
					{{ Form::label('upper_validity', __('words.tasks.upper_validity')) }}
					{{ Form::select('upper_validity', [
						0 => __('words.tasks.no_select'),
						1 => __('words.tasks.validity.upper', ['n' => 25]),
						2 => __('words.tasks.validity.upper', ['n' => 50]),
						3 => __('words.tasks.validity.upper', ['n' => 75]),
						4 => __('words.tasks.validity.upper', ['n' => 100]),
					], 0, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<div class="text-center">
					{{ Form::label('include_no_examinees', __('words.tasks.include_no_examinees')) }}
					<br>
					{{ Form::checkbox('include_no_examinees', old('include_no_examinees'), !$serached, ['style' => 'margin-top:0.6em;transform:scale(2.0);']) }}
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<button class="btn btn-primary btn-block btn-lg" type="submit" name="search" value="search" style="margin-bottom:10px;">
				@lang('words.buttons.search')
			</button>
		</div>
	{{ Form::close() }}
</div>
