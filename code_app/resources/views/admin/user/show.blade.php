@extends('layouts.app')
@section('title', __('words.titles.profile', ['name' => $user->name]))
@section('content')
	<div id="content" class="col-md-12">
		<div id="page-header" class="page-header">
			<h1 class="text-center">@lang('words.titles.profile', ['name' => $user->name])</h1>
		</div>
		@component('components.alert')
		@endcomponent
		@component('components.user_profile', ['user' => $user, 'statics' => $statics])
		@endcomponent
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					<i class="fas fa-list"></i>&thinsp;@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.users.index') }}">
					<i class="fas fa-users"></i>&thinsp;@lang('words.titles.users_list')
				</a>
			</li>
			<li class="active">
				<i class="fas fa-user"></i>&thinsp;@lang('words.users.name')&thinsp;:&thinsp;{{ $user->name }}
			</li>
		</ol>
	</div>
@endsection
