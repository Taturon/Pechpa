@extends('layouts.app')
@section('title', $inquiry->title)
@section('content')
	<div id="content" class="col-md-12">
		<div id="page-header" class="page-header">
			<h1>
				<b>{{ $inquiry->title }}</b>
			</h1>
			<div class="row">
				<div id="page-header-h2" class="col-md-4">
					<h2>
						<small>
							@lang('words.inquiries.inquired_date')&#65306;
							<span>{{ $inquiry->created_at }}</span>
						</small>
					</h2>
				</div>
				<div id="page-header-h2" class="col-md-4">
					<h2>
						<small>
							@lang('words.inquiries.categories')&#65306;
							<span>@lang(config('configs.inquiries.categories')[$inquiry->category])</span>
						</small>
					</h2>
				</div>
				<div id="page-header-h2" class="col-md-4">
					<h2>
						<small>
							@lang('words.inquiries.user_name')&#65306;
							<img src="{{ asset('storage/icons/' . $inquiry->user->icon) }}" width="20px" height="20px">
							<span>{{ $inquiry->user->name }}</span>
						</small>
					</h2>
				</div>
			</div>
		</div>
		<p id="word-wrap">
			{{ $inquiry->contents }}
		</p>
		<hr>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					@lang('words.titles.admin_dashboard')
				</a>
			</li>
			<li>
				<a href="{{ route('admin.inquiries.index') }}">
					<i class="fas fa-code"></i>&thinsp;@lang('words.titles.inquiries_list')
				</a>
			</li>
			<li class="active">{{ $inquiry->title }}</li>
		</ol>
	</div>
@endsection
