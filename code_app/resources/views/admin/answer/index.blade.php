@extends('layouts.app')
@section('title', __('words.titles.answers_list'))
@section('content')
<div id="content" class="col-md-12">
	<div id="page-header" class="page-header">
		<h1>@lang('words.titles.answers_list')</h1>
	</div>
	@component('components.alert')
	@endcomponent
	@if (count($answers) > 0)
		@component('components.answers_index', ['answers' => $answers])
		@endcomponent
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_answers')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
