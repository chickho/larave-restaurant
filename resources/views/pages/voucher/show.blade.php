<div class="row">
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Name</label>
		<span>{{ $voucher->name }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Code</label>
		<span>{{ $voucher->code }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Discount</label>
		<span>{{ $voucher->discount }}%</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Price</label>
		<span>{{ $voucher->price }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Start</label>
		<span>{{ date('d-m-Y', strtotime($voucher->start)) }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">End</label>
		<span>{{ date('d-m-Y', strtotime($voucher->end)) }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<div class="form-label" for="image">Image</div>
		<img src="{{ asset('storage/' . $voucher->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
	</div>
</div>
