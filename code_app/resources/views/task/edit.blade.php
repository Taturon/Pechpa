@extends('layouts.app')
@section('title', __('words.titles.task_edit'))
@section('header')
	<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('content')
@component('components.alert')
@endcomponent
<div class="row">
	<div id="content" class="col-md-12 form-panel">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>@lang('words.titles.task_edit')</h1></div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('tasks.update', ['task_id' => $task->id]) }}">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
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

					<!-- サンプルケース-->

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

					<!-- テストケース-->

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
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<button name="update" type="submit" class="btn btn-block btn-primary" onclick="return confirm('@lang('words.buttons.update_confirm')');">
								@lang('words.buttons.update')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('users.show', ['user' => $task->user->id]) }}">
					<i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.your_profile')
				</a>
			</li>
			<li>
				<a href="{{ route('users.tasks', ['user' => $task->user->id]) }}">
					<i class="fas fa-code"></i>&thinsp;@lang('words.titles.created_tasks', ['name' => $task->user->name])
				</a>
			</li>
			<li class="active"><i class="fas fa-code"></i>&thinsp;@lang('words.titles.task_edit')</li>
		</ol>
	</div>
</div>
@endsection
