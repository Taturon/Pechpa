@component('mail::message')
# @lang('mail.header_task_created')

<hr>

<p>
	<b>@lang('mail.task_creater')</b>
	<br>
	{{ $user->name }}
	<br>
	{{ $user->email }}
</p>
<p>
	<b>@lang('mail.task_title')</b>
	<br>
	{{ $request->title }}
</p>
<p>
	<b>@lang('mail.task_statement')</b>
	<br>
	{{ $request->statement }}
</p>
<p>
	<b>@lang('mail.task_constraints')</b>
	<br>
	{{ $request->constraints }}
</p>
<p>
	<b>@lang('mail.task_difficulty')</b>
	<br>
	{{ $request->difficulty }}
</p>

<hr>

@endcomponent
