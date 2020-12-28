@if ($errors->has('title') || $errors->has('difficulty') || $errors->has('lower_validity') || $errors->has('upper_validity'))
	<div class="alert alert-danger mb-3">
		@if ($errors->has('title'))
			<p>
				<i class="fas fa-times-circle"></i>&ensp;{{ $errors->first('title') }}
			</p>
		@endif
		@if ($errors->has('difficulty'))
			<p>
				<i class="fas fa-times-circle"></i>&ensp;{{ $errors->first('difficulty') }}
			</p>
		@endif
		@if ($errors->has('lower_validity'))
			<p>
				<i class="fas fa-times-circle"></i>&ensp;{{ $errors->first('lower_validity') }}
			</p>
		@endif
		@if ($errors->has('upper_validity'))
			<p>
				<i class="fas fa-times-circle"></i>&ensp;{{ $errors->first('upper_validity') }}
			</p>
		@endif
	</div>
@endif
