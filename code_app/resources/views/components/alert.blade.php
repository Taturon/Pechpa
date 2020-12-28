@if (session()->has('success'))
	<div class="alert alert-success mb-3">
	<i class="fas fa-check"></i>&ensp;{!! session('success') !!}
	</div>
@elseif (session()->has('error'))
	<div class="alert alert-warning mb-3">
	<i class="fas fa-exclamation-triangle"></i>&ensp;{!! session('error') !!}
	</div>
@elseif (session()->has('danger'))
	<div class="alert alert-danger mb-3">
	<i class="fas fa-times-circle"></i>&ensp;{!! session('danger') !!}
	</div>
@endif
