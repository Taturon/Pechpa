@component('mail::message')
# @lang('mail.header_task_created')

<hr>

<p>
	<b>@lang('mail.task_creater')</b>
	<br>
	{{ $user_name }}
</p>
<p>
	<b>@lang('mail.task_title')</b>
	<br>
	{{ $title }}
</p>

<hr>

@endcomponent
