@extends('layouts.app')
@section('title', __('title.task_create'))
@section('header')
<script src="{{ asset('/js/tab.js') }}"></script>
@endsection
@section('content')
<div class="container">
	@component('components.alert')
	@endcomponent
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading text-center"><h1>@lang('title.task_create')</h1></div>
				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('tasks.index') }}">
						{{ csrf_field() }}
						<div class="col-md-10 col-md-offset-1 text-center">
							<h2>@lang('title.task_basic_configuration')</h2>
						</div>
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" type="text" class="col-md-10 col-md-offset-1">
								@lang('label.task_title')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '50'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
								@if ($errors->has('title'))
									<span class="help-block">
										<strong>{{ $errors->first('title') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('statement') ? ' has-error' : '' }}">
							<label for="statement" class="col-md-10 col-md-offset-1">
								@lang('label.task_statement')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab statement" rows="2" class="form-control" name="statement" required>{{ old('statement') }}</textarea>
								@if ($errors->has('statement'))
									<span class="help-block">
										<strong>{{ $errors->first('statement') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('constraints') ? ' has-error' : '' }}">
							<label for="constraints" type="text" class="col-md-10 col-md-offset-1">
								@lang('label.task_constraints')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab constraints" rows="2" class="form-control" name="constraints" required>{{ old('constraints') }}</textarea>
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
								@lang('label.task_input')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<input id="input" type="text" class="form-control" name="input" value="{{ old('input') }}" required autofocus>
								@if ($errors->has('input'))
									<span class="help-block">
										<strong>{{ $errors->first('input') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('input_code') ? ' has-error' : '' }}">
							<label for="input_code" class="col-md-10 col-md-offset-1">
								@lang('label.task_input_code')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab input_code" rows="2" class="form-control" name="input_code" required>{{ old('input_code') }}</textarea>
								@if ($errors->has('input_code'))
									<span class="help-block">
										<strong>{{ $errors->first('input_code') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('output') ? ' has-error' : '' }}">
							<label for="output" type="text" class="col-md-10 col-md-offset-1">
								@lang('label.task_output')
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<input id="output" type="text" class="form-control" name="output" value="{{ old('output') }}" required autofocus>
								@if ($errors->has('output'))
									<span class="help-block">
										<strong>{{ $errors->first('output') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('output_code') ? ' has-error' : '' }}">
							<label for="output_code" class="col-md-10 col-md-offset-1">
								@lang('label.task_output_code')
								<small>
									<span class="label label-info">@lang('notice.optional')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab output_code" rows="2" class="form-control" name="output_code" required>{{ old('output_code') }}</textarea>
								@if ($errors->has('output_code'))
									<span class="help-block">
										<strong>{{ $errors->first('output_code') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-10 col-md-offset-1 text-center">
							<h2>@lang('title.task_samples')</h2>
						</div>
						<div class="form-group{{ $errors->has('sample_input_code_1') ? ' has-error' : '' }}">
							<label for="sample_input_1" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_input') 1
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_input_1" rows="2" class="form-control" name="sample_input_1" required>{{ old('sample_input_1') }}</textarea>
								@if ($errors->has('sample_input_1'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_input_1') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sample_output_1') ? ' has-error' : '' }}">
							<label for="sample_output_1" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_output') 1
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_output_1" rows="2" class="form-control" name="sample_output_1" required>{{ old('sample_output_1') }}</textarea>
								@if ($errors->has('sample_output_1'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_output_1') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sample_input_2') ? ' has-error' : '' }}">
							<label for="sample_input_2" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_input') 2
								<small>
									<span class="label label-info">@lang('notice.optional')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_input_2" rows="2" class="form-control" name="sample_input_2" required>{{ old('sample_input_2') }}</textarea>
								@if ($errors->has('sample_input_2'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_input_2') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sample_output_2') ? ' has-error' : '' }}">
							<label for="sample_output_2" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_output') 2
								<small>
									<span class="label label-info">@lang('notice.optional')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_output_2" rows="2" class="form-control" name="sample_output_2" required>{{ old('sample_output_2') }}</textarea>
								@if ($errors->has('sample_output_2'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_output_2') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sample_input_3') ? ' has-error' : '' }}">
							<label for="sample_input_3" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_input') 3
								<small>
									<span class="label label-info">@lang('notice.optional')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_input_3" rows="2" class="form-control" name="sample_input_3" required>{{ old('sample_input_3') }}</textarea>
								@if ($errors->has('sample_input_3'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_input_3') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sample_output_3') ? ' has-error' : '' }}">
							<label for="sample_output_3" class="col-md-10 col-md-offset-1">
								@lang('label.task_sample_output') 3
								<small>
									<span class="label label-info">@lang('notice.optional')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab sample_output_3" rows="2" class="form-control" name="sample_output_3" required>{{ old('sample_output_3') }}</textarea>
								@if ($errors->has('sample_output_3'))
									<span class="help-block">
										<strong>{{ $errors->first('sample_output_3') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-10 col-md-offset-1 text-center">
							<h2>@lang('title.task_tests')</h2>
						</div>
						<div class="form-group{{ $errors->has('test_input_1') ? ' has-error' : '' }}">
							<label for="test_input_1" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_input') 1
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_input_1" rows="2" class="form-control" name="test_input_1" required>{{ old('test_input_1') }}</textarea>
								@if ($errors->has('test_input_1'))
									<span class="help-block">
										<strong>{{ $errors->first('test_input_1') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_output_1') ? ' has-error' : '' }}">
							<label for="test_output_1" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_output') 1
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_output_1" rows="2" class="form-control" name="test_output_1" required>{{ old('test_output_1') }}</textarea>
								@if ($errors->has('test_output_1'))
									<span class="help-block">
										<strong>{{ $errors->first('test_output_1') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_input_2') ? ' has-error' : '' }}">
							<label for="test_input_2" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_input') 2
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_input_2" rows="2" class="form-control" name="test_input_2" required>{{ old('test_input_2') }}</textarea>
								@if ($errors->has('test_input_2'))
									<span class="help-block">
										<strong>{{ $errors->first('test_input_2') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_output_2') ? ' has-error' : '' }}">
							<label for="test_output_2" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_output') 2
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_output_2" rows="2" class="form-control" name="test_output_2" required>{{ old('test_output_2') }}</textarea>
								@if ($errors->has('test_output_2'))
									<span class="help-block">
										<strong>{{ $errors->first('test_output_2') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_input_3') ? ' has-error' : '' }}">
							<label for="test_input_3" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_input') 3
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_input_3" rows="2" class="form-control" name="test_input_3" required>{{ old('test_input_3') }}</textarea>
								@if ($errors->has('test_input_3'))
									<span class="help-block">
										<strong>{{ $errors->first('test_input_3') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_output_3') ? ' has-error' : '' }}">
							<label for="test_output_3" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_output') 3
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_output_3" rows="2" class="form-control" name="test_output_3" required>{{ old('test_output_3') }}</textarea>
								@if ($errors->has('test_output_3'))
									<span class="help-block">
										<strong>{{ $errors->first('test_output_3') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_input_4') ? ' has-error' : '' }}">
							<label for="test_input_4" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_input') 4
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_input_4" rows="2" class="form-control" name="test_input_4" required>{{ old('test_input_4') }}</textarea>
								@if ($errors->has('test_input_4'))
									<span class="help-block">
										<strong>{{ $errors->first('test_input_4') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('test_output_4') ? ' has-error' : '' }}">
							<label for="test_output_4" class="col-md-10 col-md-offset-1">
								@lang('label.task_test_output') 4
								<small>
									<span class="label label-danger">@lang('notice.required')</span>
									&emsp;
									<span class="label label-warning">@lang('notice.max_characters', ['count' => '500'])</span>
								</small>
							</label>
							<div class="col-md-10 col-md-offset-1">
								<textarea id="tab test_output_4" rows="2" class="form-control" name="test_output_4" required>{{ old('test_output_4') }}</textarea>
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
								<button type="submit" class="btn btn-block btn-primary">
									@lang('button.send')
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
