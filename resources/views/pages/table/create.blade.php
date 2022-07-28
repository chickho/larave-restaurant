@extends('templates.app')

@section('content')
	<div class="page-header d-print-none">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">
					Table
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item"><a href="/table">Table</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="#">Add</a></li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="col-2">
						<a href="/table" class="btn btn-warning w-100">
							<i class="fas fa-arrow-left"></i>
							&nbsp;&nbsp;Back
						</a>
					</div>
				</div>
				<div class="card-body">
					<form action="/table" method="POST">
						@csrf
						<div class="row">
							{{-- <div class="col-12 col-md-6 mb-3">
								<label class="form-label">Code</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Code">
								@error('code')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div> --}}
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Capacity</label>
								<input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity"
									placeholder="Capacity">
								@error('capacity')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Booked</label>
								<div>
									<select class="form-select @error('booked') is-invalid @enderror" name="booked">
										<option value="no">No</option>
										<option value="yes">Yes</option>
									</select>
									@error('booked')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
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
@endsection
