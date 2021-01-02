@extends('layouts.app')
@section('title', __('words.titles.inquiries_list'))
@section('content')
<div id="content" class="col-md-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.inquiries_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($inquiries) > 0)
		@component('components.inquiries_index', ['inquiries' => $inquiries])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_inquiries')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
