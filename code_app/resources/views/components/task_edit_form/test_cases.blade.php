<div class="col-md-10 col-md-offset-1 text-center">
	<h2>@lang('words.tasks.tests')</h2>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr style="border-width: 5px;">
</div>
<div class="form-group{{ $errors->has('test_input_1') ? ' has-error' : '' }}">
	<label for="test_input_1" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_input') 1
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_input_1" rows="2" class="form-control" name="test_input_1" required>{{ old('test_input_1', $task->tests[0]->input) }}</textarea>
		@if ($errors->has('test_input_1'))
			<span class="help-block">
				<strong>{{ $errors->first('test_input_1') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('test_output_1') ? ' has-error' : '' }}">
	<label for="test_output_1" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_output') 1
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_output_1" rows="2" class="form-control" name="test_output_1" required>{{ old('test_output_1', $task->tests[0]->output) }}</textarea>
		@if ($errors->has('test_output_1'))
			<span class="help-block">
				<strong>{{ $errors->first('test_output_1') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('test_input_2') ? ' has-error' : '' }}">
	<label for="test_input_2" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_input') 2
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_input_2" rows="2" class="form-control" name="test_input_2" required>{{ old('test_input_2', $task->tests[1]->input) }}</textarea>
		@if ($errors->has('test_input_2'))
			<span class="help-block">
				<strong>{{ $errors->first('test_input_2') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('test_output_2') ? ' has-error' : '' }}">
	<label for="test_output_2" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_output') 2
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_output_2" rows="2" class="form-control" name="test_output_2" required>{{ old('test_output_2', $task->tests[1]->output) }}</textarea>
		@if ($errors->has('test_output_2'))
			<span class="help-block">
				<strong>{{ $errors->first('test_output_2') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('test_input_3') ? ' has-error' : '' }}">
	<label for="test_input_3" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_input') 3
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_input_3" rows="2" class="form-control" name="test_input_3" required>{{ old('test_input_3', $task->tests[2]->input) }}</textarea>
		@if ($errors->has('test_input_3'))
			<span class="help-block">
				<strong>{{ $errors->first('test_input_3') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('test_output_3') ? ' has-error' : '' }}">
	<label for="test_output_3" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_output') 3
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_output_3" rows="2" class="form-control" name="test_output_3" required>{{ old('test_output_3', $task->tests[2]->output) }}</textarea>
		@if ($errors->has('test_output_3'))
			<span class="help-block">
				<strong>{{ $errors->first('test_output_3') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('test_input_4') ? ' has-error' : '' }}">
	<label for="test_input_4" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_input') 4
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_input_4" rows="2" class="form-control" name="test_input_4" required>{{ old('test_input_4', $task->tests[3]->input) }}</textarea>
		@if ($errors->has('test_input_4'))
			<span class="help-block">
				<strong>{{ $errors->first('test_input_4') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('test_output_4') ? ' has-error' : '' }}">
	<label for="test_output_4" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.test_output') 4
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab test_output_4" rows="2" class="form-control" name="test_output_4" required>{{ old('test_output_4', $task->tests[3]->output) }}</textarea>
		@if ($errors->has('test_output_4'))
			<span class="help-block">
				<strong>{{ $errors->first('test_output_4') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
