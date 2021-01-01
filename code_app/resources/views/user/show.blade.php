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
	</div>
@endsection
