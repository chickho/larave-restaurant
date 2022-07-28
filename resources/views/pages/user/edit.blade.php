@extends('templates.app')

@section('content')
	<div class="container-xl">
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="page-title">
						User
					</h2>
					<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
						<li class="breadcrumb-item"><a href="/user">User</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="col-2">
							<a href="/user" class="btn btn-warning w-100">
								<i class="fas fa-arrow-left"></i>
								&nbsp;&nbsp;Back
							</a>
						</div>
					</div>
					<div class="card-body">
						<form action="/user/{{ $user->slug }}" method="POST">
							@method('put')
							@csrf
							<div class="row">
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Name</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
										value="{{ $user->name }}">
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Email</label>
									<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"
										value="{{ $user->email }}">
									@error('email')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Role</label>
									<div>
										<select class="form-select @error('role') is-invalid @enderror" name="role">
											<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
											<option value="cashier" {{ $user->role == 'cashier' ? 'selected' : '' }}>Cashier</option>
											<option value="kitchen" {{ $user->role == 'kitchen' ? 'selected' : '' }}>Kitchen</option>
											<option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
										</select>
										@error('role')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Point</label>
									<input type="number" class="form-control @error('point') is-invalid @enderror" name="point" placeholder="Point"
										value="{{ $user->point == null ? 0 : $user->point }}">
									@error('point')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="col-2">
								<button type="submit" class="btn btn-success w-100">
									<i class="far fa-save"></i>
									&nbsp;&nbsp;Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
