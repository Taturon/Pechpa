@extends('layouts.app')
@section('title', __('words.titles.inquiry_create'))
@section('content')
@component('components.alert')
@endcomponent
<div class="row">
	<div id="content" class="col-md-12 form-panel">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>@lang('words.titles.inquiry_create')</h1></div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('inquiries.store') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						<label for="title" class="col-md-10 col-md-offset-1">
							@lang('words.inquiries.title')
							<small>
								<span class="label label-danger">@lang('words.notices.required')</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '500'])</span>
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
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
						<label for="category" class="col-md-10 col-md-offset-1">
							@lang('words.inquiries.categories')
							<small>
								<span class="label label-danger">@lang('words.notices.required')</span>
							</small>
						</label>
						<div class="col-md-10 col-md-offset-1">
							<select id="category" class="form-control" name="category">
							@foreach(config('configs.inquiries.categories') as $k => $category)
								<option value="{{ $k }}" @if (old('category') == $k) selected @endif>{{ __($category) }}</option>
							@endforeach
							</select>
							@if ($errors->has('category'))
								<span class="help-block">
									<strong>{{ $errors->first('category') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
						<label for="contents" class="col-md-10 col-md-offset-1">
							@lang('words.inquiries.contents')
							<small>
								<span class="label label-danger">@lang('words.notices.required')</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '1000'])</span>
							</small>
						</label>
						<div class="col-md-10 col-md-offset-1">
							<textarea id="contents" rows="5" class="form-control" name="contents" required>{{ old('contents') }}</textarea>
							@if ($errors->has('contents'))
								<span class="help-block">
									<strong>{{ $errors->first('contents') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<hr>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<button type="submit" class="btn btn-block btn-primary" onclick="return confirm('@lang('words.buttons.send_confirm')');">
								@lang('words.buttons.send')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
