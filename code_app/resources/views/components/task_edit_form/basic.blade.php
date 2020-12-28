<div class="col-md-10 col-md-offset-1 text-center">
	<h2>@lang('words.tasks.basic_configuration')</h2>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr style="border-width: 5px;">
</div>
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label for="title" type="text" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.title')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '50'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}" required autofocus>
		@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('statement') ? ' has-error' : '' }}">
	<label for="statement" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.statement')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab statement" rows="2" class="form-control" name="statement" required>{{ old('statement', $task->statement) }}</textarea>
		@if ($errors->has('statement'))
			<span class="help-block">
				<strong>{{ $errors->first('statement') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('constraints') ? ' has-error' : '' }}">
	<label for="constraints" type="text" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.constraints')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab constraints" rows="2" class="form-control" name="constraints" required>{{ old('constraints', $task->constraints) }}</textarea>
		@if ($errors->has('constraints'))
			<span class="help-block">
				<strong>{{ $errors->first('constraints') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<hr>
</div>
<div class="form-group{{ $errors->has('input') ? ' has-error' : '' }}">
	<label for="input" type="text" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.input_description')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<input id="input" type="text" class="form-control" name="input" value="{{ old('input', $task->input) }}" required autofocus>
		@if ($errors->has('input'))
			<span class="help-block">
				<strong>{{ $errors->first('input') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('input_code') ? ' has-error' : '' }}">
	<label for="input_code" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.input')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab input_code" rows="2" class="form-control" name="input_code" required>{{ old('input_code', $task->input_code) }}</textarea>
		@if ($errors->has('input_code'))
			<span class="help-block">
				<strong>{{ $errors->first('input_code') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('output') ? ' has-error' : '' }}">
	<label for="output" type="text" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.output_description')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<input id="output" type="text" class="form-control" name="output" value="{{ old('output', $task->output) }}" required autofocus>
		@if ($errors->has('output'))
			<span class="help-block">
				<strong>{{ $errors->first('output') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('output_code') ? ' has-error' : '' }}">
	<label for="output_code" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.output')
		<small>
			<span class="label label-info">@lang('words.notices.optional')</span>
			&emsp;
			<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<textarea id="tab output_code" rows="2" class="form-control" name="output_code">{{ old('output_code', $task->output_code) }}</textarea>
		@if ($errors->has('output_code'))
			<span class="help-block">
				<strong>{{ $errors->first('output_code') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('difficulty') ? ' has-error' : '' }}">
	<label for="difficulty" class="col-md-10 col-md-offset-1">
		@lang('words.tasks.difficulty')
		<small>
			<span class="label label-danger">@lang('words.notices.required')</span>
		</small>
	</label>
	<div class="col-md-10 col-md-offset-1">
		<span style="text-align:center;"><output id="output1">{{ old('difficulty', $task->difficulty) }}</output></span>
		<input id="difficulty" type="range" name="difficulty" value="{{ old('difficulty', $task->difficulty) }}" min="1" max="{{ config('tasks.max_difficulty') }}" step="1" oninput="document.getElementById('output1').value=this.value">
		@if ($errors->has('difficulty'))
			<span class="help-block">
				<strong>{{ $errors->first('difficulty') }}</strong>
			</span>
		@endif
	</div>
</div>
