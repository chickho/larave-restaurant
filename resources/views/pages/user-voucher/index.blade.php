@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Your Voucher
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item active" aria-current="page"><a href="#">Your Voucher</a></li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					@foreach ($vouchers as $voucher)
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<img @if ($voucher->voucher->image == null || $voucher->voucher->image == '') src="./static/no-image.png" @else src="{{ asset('storage/' . $voucher->voucher->image) }}" @endif alt="">
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-6">
											<h3>{{ $voucher->voucher->name }}</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
