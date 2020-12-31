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
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:15%;">
							<div class="text-center">@lang('words.inquiries.created_at')</div>
						</th>
						<th style="width:15%;">
							<div class="text-center">@lang('words.inquiries.categories')</div>
						</th>
						<th style="width:55%;">
							<div class="text-center">@lang('words.inquiries.title')</div>
						</th>
						<th style="width:15%;">
							<div class="text-center">@lang('words.inquiries.user_name')</div>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($inquiries as $inquiry)
						<tr>
							<td class="text-center">
								{{ $inquiry->created_at }}
							</td>
							<td class="text-center">
								@lang(config('configs.inquiries.categories')[$inquiry->category])
							</td>
							<td>
								{{ $inquiry->title }}
							</td>
							<td class="text-center">
								<img src="{{ asset('storage/icons/' . $inquiry->user->icon) }}" width="20px" height="20px">
								{{ $inquiry->user->name }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $inquiries->links() }}
			</div>
		</div>
	@else
		<div class="row text-center">
			<h1 style="color:lightgray;">@lang('words.notices.no_inquiries')</h1>
		</div>
	@endif
	<hr>
</div>
@endsection
