@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Order
				</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<form action="/payment" method="POST">
			@csrf
			<div class="row">
				<div class="col-xl-6 col-sm-12 col-md-6 mb-3">
					<label class="form-label">Table</label>
					<div>
						{{ $table[0]['name'] }}
						<input type="hidden" name="table_id" value="{{ $table[0]['id'] }}">
					</div>
				</div>
				<input type="hidden" name="voucher">
			</div>
			<div class="card-tabs">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a href="#makanan" class="nav-link active" data-toggle="tab">Makanan</a></li>
					<li class="nav-item"><a href="#minuman" class="nav-link" data-toggle="tab">Minuman</a></li>
					<li class="nav-item"><a href="#snack" class="nav-link" data-toggle="tab">Snack</a></li>
				</ul>
				<div class="tab-content">
					<div id="makanan" class="card tab-pane active show">
						<div class="card-body text-center">
							<div class="row">
								@foreach ($foods as $food)
									<div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
										<div class="card" style="width: 235px;">
											<img src="{{ asset('storage/' . $food->image) }}" class="card-img-top"
												style="width: 235px; height: 281px;">
											<div class="card-body">
												<h5 class="card-title">
													{{ $food->name }}
													<input type="hidden" name="id[]" value="{{ $food->id }}">
													<input type="hidden" name="name[]" value="{{ $food->name }}">
													<input type="hidden" name="image[]" value="{{ $food->image }}">
												</h5>
												<p class="card-text">
													Rp {{ number_format($food->price) }}
													<input type="hidden" name="price[]" value="{{ $food->price }}">
												</p>
												<input type="number" name="qty[]" class="form-control" placeholder="Qty"><br>
												<textarea class="form-control" name="note[]" rows="1" placeholder="Note"></textarea>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div id="minuman" class="card tab-pane">
						<div class="card-body text-center">
							<div class="row">
								@foreach ($beverages as $beverage)
									<div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
										<div class="card" style="width: 235px;">
											<img src="{{ asset('storage/' . $beverage->image) }}" class="card-img-top"
												style="width: 235px; height: 281px;">
											<div class="card-body">
												<h5 class="card-title">
													{{ $beverage->name }}
													<input type="hidden" name="id[]" value="{{ $beverage->id }}">
													<input type="hidden" name="name[]" value="{{ $beverage->name }}">
													<input type="hidden" name="image[]" value="{{ $beverage->image }}">
												</h5>
												<p class="card-text">
													Rp {{ number_format($beverage->price) }}
													<input type="hidden" name="price[]" value="{{ $beverage->price }}">
												</p>
												<input type="number" name="qty[]" class="form-control" placeholder="Qty"><br>
												<textarea class="form-control" name="note[]" rows="1" placeholder="Note"></textarea>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div id="snack" class="card tab-pane">
						<div class="card-body text-center">
							<div class="row">
								@foreach ($snacks as $snack)
									<div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
										<div class="card" style="width: 235px;">
											<img src="{{ asset('storage/' . $snack->image) }}" class="card-img-top"
												style="width: 235px; height: 281px;">
											<div class="card-body">
												<h5 class="card-title">
													{{ $snack->name }}
													<input type="hidden" name="id[]" value="{{ $snack->id }}">
													<input type="hidden" name="name[]" value="{{ $snack->name }}">
													<input type="hidden" name="image[]" value="{{ $snack->image }}">
												</h5>
												<p class="card-text">
													Rp {{ number_format($snack->price) }}
													<input type="hidden" name="price[]" value="{{ $snack->price }}">
												</p>
												<input type="number" name="qty[]" class="form-control" placeholder="Qty"><br>
												<textarea class="form-control" name="note[]" rows="1" placeholder="Note"></textarea>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-success w-100">
					<i class="far fa-save"></i>
					&nbsp;&nbsp;Order
				</button>
			</div>
		</form>
	</div>
@endsection
