@component('mail::message')
# @lang('words.mails.header_task_created')

<hr>

<p>
	<b>@lang('words.tasks.creator')</b>
	<br>
	{{ $user->name }}
	<br>
	{{ $user->email }}
</p>
<p>
	<b>@lang('words.tasks.title')</b>
	<br>
	{{ $request['title'] }}
</p>
<p>
	<b>@lang('words.tasks.statement')</b>
	<br>
	{{ $request['statement'] }}
</p>
<p>
	<b>@lang('words.tasks.constraints')</b>
	<br>
	{{ $request['constraints'] }}
</p>
<p>
	<b>@lang('words.tasks.difficulty')</b>
	<br>
	<span style="color:{{ config('tasks.colors')[$request['difficulty']] }};">
		{{ config('tasks.stars')[$request['difficulty']] }}
	</span>
</p>

<hr>

@endcomponent
