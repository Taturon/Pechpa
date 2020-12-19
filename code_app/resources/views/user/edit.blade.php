@extends('layouts.app')
@section('title', __('words.titles.profile_edit'))
@section('content')
@component('components.alert')
@endcomponent
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>@lang('words.titles.profile_edit')</h1></div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('users.update', ['user' => Auth::user()->id]) }}">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
						<label for="icon" class="col-md-10 col-md-offset-1">
							@lang('words.users.icon')
							<small>
								<span class="label label-info">@lang('words.notices.optional')</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.max_mega_bytes', ['byte' => '5'])</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.valid_extensions')</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.icon_size', config('limits.user_icon_size'))</span>
							</small>
						</label>
						<div class="col-md-10 col-md-offset-1">
							<input id="icon" type="file" name="icon" @if (Auth::user()->id === 1) disabled @endif>
							@if ($errors->has('icon'))
								<span class="help-block">
								<strong>{{ $errors->first('icon') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" type="text" class="col-md-10 col-md-offset-1">
							@lang('words.users.name')
							<small>
								<span class="label label-info">@lang('words.notices.optional')</span>
								&emsp;
								<span class="label label-warning">@lang('words.notices.max_characters', ['count' => '255'])</span>
							</small>
						</label>
						<div class="col-md-10 col-md-offset-1">
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" @if (Auth::user()->id === 1) disabled @endif>
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<hr>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<button name="approval" type="submit" class="btn btn-block btn-primary"
								onclick="return confirm('@lang('words.buttons.update_confirm')');"
								@if (Auth::user()->id === 1) disabled @endif
							>
								@if (Auth::user()->id === 1) @lang('words.buttons.can_not_update') @else @lang('words.buttons.update') @endif
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<ol class="breadcrumb">
			<li><a href="{{ route('users.show', ['user_id' => Auth::user()->id]) }}"><i class="fas fa-address-card"></i>&thinsp;@lang('words.titles.profile')</a></li>
			<li class="active"><i class="fas fa-user-edit"></i>&thinsp;@lang('words.titles.profile_edit')</li>
		</ol>
	</div>
</div>
@endsection
