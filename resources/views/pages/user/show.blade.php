<div class="row">
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Name</label>
		<span>{{ $user->name }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Email</label>
		<span>{{ $user->email }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Role</label>
		<span>{{ ucfirst(trans($user->role)) }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Point</label>
		<span>{{ $user->point == null ? '0' : $user->point }}</span>
	</div>
</div>
