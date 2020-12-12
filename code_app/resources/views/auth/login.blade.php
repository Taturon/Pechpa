@extends('layouts.app')

@section('title', __('title.login'))
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">@lang('title.login')</div>

			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">@lang('label.mail')</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">@lang('label.password')</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" required>

							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('label.remember')
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-8 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								@lang('label.login')
							</button>

							<a class="btn btn-link" href="{{ route('password.request') }}">
								@lang('label.forgot')
							</a>
						</div>
					</div>
				</form>
				<hr>
				<p class="text-center">
					<span>@lang('button.or')</span>
				</p>
				<div class="col-md-12">
					<button class="btn btn-block btn-primary" type="button" onclick="location.href='{{ route('guest_login') }}'">
						@lang('button.guest_login')
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
