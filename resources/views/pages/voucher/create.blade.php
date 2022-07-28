@extends('templates.app')

@section('content')
	<div class="page-header d-print-none">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">
					Voucher
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item"><a href="/voucher">Voucher</a></li>
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
						<a href="/voucher" class="btn btn-warning w-100">
							<i class="fas fa-arrow-left"></i>
							&nbsp;&nbsp;Back
						</a>
					</div>
				</div>
				<div class="card-body">
					<form action="/voucher" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
									value="{{ old('name') }}">
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Code</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Code"
									value="{{ old('code') }}">
								@error('code')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Discount</label>
								<div class="input-group mb-2">
									<input type="text" class="form-control @error('discount') is-invalid @enderror" name="discount"
										placeholder="Discount" value="{{ old('discount') }}">
									<span class="input-group-text">
										%
									</span>
									@error('discount')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Price</label>
								<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price"
									value="{{ old('price') }}">
								@error('price')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">Start</label>
								<input id="start" type="date" value="{{ old('start') }}"
									class="form-control @error('start') is-invalid @enderror" placeholder="Start" name="start" />
								@error('start')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label class="form-label">End</label>
								<input id="end" type="date" value="{{ old('end') }}" class="form-control @error('end') is-invalid @enderror"
									placeholder="End" name="end" />
								@error('end')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-12 col-md-6 mb-3">
								<div class="form-label" for="image">Image</div>
								<img class="img-preview img-fluid mb-3 col-sm-5">
								<input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"
									onchange="previewImage()">
								@error('image')
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
@endsection

@push('scripts')
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  flatpickr(document.getElementById('start'), {});
	 });
	 document.addEventListener("DOMContentLoaded", function() {
	  flatpickr(document.getElementById('end'), {});
	 });
	</script>
@endpush
