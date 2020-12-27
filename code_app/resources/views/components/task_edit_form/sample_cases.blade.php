<div class="col-md-10 col-md-offset-1 text-center">
	<h2>@lang('words.tasks.samples')</h2>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr style="border-width: 5px;">
</div>
<div class="form-group{{ $errors->has('sample_input_1') ? ' has-error' : '' }}">
	<label for="sample_input_1" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_input') 1
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_input_1" rows="2" class="form-control" name="sample_input_1" required>{{ old('sample_input_1', $task->samples[0]->input_code) }}</textarea>
		@if ($errors->has('sample_input_1'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_input_1') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('sample_output_1') ? ' has-error' : '' }}">
	<label for="sample_output_1" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_output') 1
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_output_1" rows="2" class="form-control" name="sample_output_1" required>{{ old('sample_output_1', $task->samples[0]->output_code) }}</textarea>
		@if ($errors->has('sample_output_1'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_output_1') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('sample_input_2') ? ' has-error' : '' }}">
	<label for="sample_input_2" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_input') 2
		<small>
			<span class="label label-info">@lang('words.notices.optional')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_input_2" rows="2" class="form-control" name="sample_input_2">{{ old('sample_input_2', $task->samples[1]->input_code ?? '') }}</textarea>
		@if ($errors->has('sample_input_2'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_input_2') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('sample_output_2') ? ' has-error' : '' }}">
	<label for="sample_output_2" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_output') 2
		<small>
			<span class="label label-info">@lang('words.notices.optional')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_output_2" rows="2" class="form-control" name="sample_output_2">{{ old('sample_output_2', $task->samples[1]->output_code ?? '') }}</textarea>
		@if ($errors->has('sample_output_2'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_output_2') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('sample_input_3') ? ' has-error' : '' }}">
	<label for="sample_input_3" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_input') 3
		<small>
			<span class="label label-info">@lang('words.notices.optional')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_input_3" rows="2" class="form-control" name="sample_input_3">{{ old('sample_input_3', $task->samples[2]->input_code ?? '') }}</textarea>
		@if ($errors->has('sample_input_3'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_input_3') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('sample_output_3') ? ' has-error' : '' }}">
	<label for="sample_output_3" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.sample_output') 3
		<small>
			<span class="label label-info">@lang('words.notices.optional')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab sample_output_3" rows="2" class="form-control" name="sample_output_3">{{ old('sample_output_3', $task->samples[2]->output_code ?? '') }}</textarea>
		@if ($errors->has('sample_output_3'))
			<span class="help-block">
				<strong>{{ $errors->first('sample_output_3') }}</strong>
			</span>
		@endif
	</div>
</div>
