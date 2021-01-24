<div id="page-header" class="page-header">
	<h1>
		<b>{{ $task->title }}</b>
	</h1>
	<div class="row">
		<div id="page-header-h2" class="col-md-3">
			<h2>
				<b>
					<small>@lang('words.tasks.difficulty')&#65306;
					<span style="color:{{ config('tasks.colors')[$task->difficulty] }};">
						{{ config('tasks.stars')[$task->difficulty] }}
					</span>
					</small>
				</b>
			</h2>
		</div>
		<div id="page-header-h2" class="col-md-3">
			<h2>
				<b>
					<small>@lang('words.tasks.solved')&#65306;</small>
					<span>{{ $task->solved }}</span>
				</b>
			</h2>
		</div>
		<div id="page-header-h2" class="col-md-3">
			<h2>
				<b>
					<small>@lang('words.tasks.examinees')&#65306;</small>
					<span>{{ $task->examinees }}</span>
				</b>
			</h2>
		</div>
		<div id="page-header-h2" class="col-md-3">
			<h2>
				<b>
					<small>@lang('words.tasks.validity.validity')&#65306;</small>
					<span>
						{{ $task->examinees == 0 ? __('words.tasks.no_examinees') : sprintf('%03.1f', $task->solved / $task->examinees * 100) . '%' }}
					</span>
				</b>
			</h2>
		</div>
	</div>
</div>
@component('components.alert')
@endcomponent
<h2><b>@lang('words.tasks.statement')</b></h2>
<p>{!! nl2br(e($task->statement)) !!}</p>
<h2><b>@lang('words.tasks.constraints')</b></h2>
<p>{!! nl2br(e($task->constraints)) !!}</p>
<h2><b>@lang('words.tasks.input')</b></h2>
<p>{{ $task->input }}</p>
<pre><code>{{ $task->input_code }}</code></pre>
<h2><b>@lang('words.tasks.output')</b></h2>
<p>{{ $task->output }}</p>
@isset($task->output_code)
	<pre><code>{{ $task->output_code }}</code></pre>
@endisset
