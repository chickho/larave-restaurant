@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<h1 class="page-title mt-5 text-center">
				Your Voucher
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					@if (count($vouchers) > 0)
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
					@else
						Voucer belum tersedia
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
