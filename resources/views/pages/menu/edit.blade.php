@extends('templates.app')

@section('content')
	<div class="container-xl">
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="page-title">
						Menu
					</h2>
					<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
						<li class="breadcrumb-item"><a href="/menu">Menu</a></li>
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
							<a href="/menu" class="btn btn-warning w-100">
								<i class="fas fa-arrow-left"></i>
								&nbsp;&nbsp;Back
							</a>
						</div>
					</div>
					<div class="card-body">
						<form action="/menu/{{ $menu->slug }}" method="POST" enctype="multipart/form-data">
							@method('put')
							@csrf
							<div class="row">
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Name</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
										value="{{ $menu->name }}">
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Category</label>
									<div>
										<select class="form-select" name="category">
											<option value="Makanan" {{ $menu->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
											<option value="Minuman" {{ $menu->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
											<option value="Snack" {{ $menu->category == 'Snack' ? 'selected' : '' }}>Snack</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 mb-3">
									<label class="form-label">Price</label>
									<div class="input-group mb-2">
										<span class="input-group-text">
											Rp
										</span>
										<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price"
											value="{{ $menu->price }}">
										@error('price')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-md-6 mb-3">
									<div class="form-label" for="image">Image</div>
									<input type="hidden" name="oldImage" value="{{ $menu->image }}">
									@if ($menu->image)
										<img src="{{ asset('storage/' . $menu->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
									@else
										<img class="img-preview img-fluid mb-3 col-sm-5">
									@endif
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
	</div>
@endsection
