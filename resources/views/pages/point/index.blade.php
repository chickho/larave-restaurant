@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Point
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item active" aria-current="page"><a href="#">Point</a></li>
				</ol>
			</div>
		</div>
	</div>
	@if (session()->has('success'))
		<div class="alert alert-important alert-success alert-dismissible" role="alert">
			<div class="d-flex">
				<div>
					{{ session('success') }}
				</div>
			</div>
			<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
		</div>
	@endif
	@if (session()->has('error'))
		<div class="alert alert-important alert-danger alert-dismissible" role="alert">
			<div class="d-flex">
				<div>
					{{ session('error') }}
				</div>
			</div>
			<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
		</div>
	@endif
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h2>Point Anda</h2>
					<h1>{{ $point->point }}</h1>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Beli Voucher
				</div>
				<div class="card-body">
					@foreach ($vouchers as $voucher)
						<form action="/point/buy" method="post">
							@csrf
							<input type="hidden" name="slug" value="{{ $voucher->slug }}">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										@if ($voucher->image == null || $voucher->image == '')
											<img src="./static/no-image.png" alt="">
										@else
											<img src="{{ asset('storage/' . $voucher->image) }}" alt="">
										@endif
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-6">
												<h3>{{ $voucher->name }}</h3>
												{{ $voucher->price }} point
											</div>
											<div class="col-6 text-right">
												<button type="submit" class="btn btn-primary">Buy</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
