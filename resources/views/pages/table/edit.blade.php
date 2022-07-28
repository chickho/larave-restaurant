@extends('templates.app')

@section('content')
	<div class="container-xl">
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="page-title">
						Table
					</h2>
					<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
						<li class="breadcrumb-item"><a href="/table">Table</a></li>
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
							<a href="/table" class="btn btn-warning w-100">
								<i class="fas fa-arrow-left"></i>
								&nbsp;&nbsp;Back
							</a>
						</div>
					</div>
					<div class="card-body">
						<form action="/table/{{ $table->slug }}" method="POST">
							@method('put')
							@csrf
							<div class="row">
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Code</label>
									<input type="text" class="form-control" name="code" placeholder="Code" value="{{ $table->code }}">
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Name</label>
									<input type="text" class="form-control" name="name" placeholder="Name" value="{{ $table->name }}">
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Capacity</label>
									<input type="text" class="form-control" name="capacity" placeholder="Capacity"
										value="{{ $table->capacity }}">
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Booked</label>
									<div>
										<select class="form-select" name="booked">
											<option value="no" {{ $table->booked == 'No' ? 'selected' : '' }}>No</option>
											<option value="yes" {{ $table->booked == 'Yes' ? 'selected' : '' }}>Yes</option>
										</select>
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
	</div>
@endsection
