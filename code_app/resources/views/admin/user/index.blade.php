@extends('layouts.app')
@section('title', __('words.titles.users_list'))
@section('content')
<div id="content" class="col-md-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.users_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($users) > 0)
		@component('components.users_index', ['users' => $users])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_users')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
