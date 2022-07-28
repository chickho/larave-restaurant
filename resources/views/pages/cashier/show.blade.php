<div class="mb-3 input-order">
	<div class="row">
		<div class="col">
			<label class="form-label">Pesanan</label>
		</div>
		<div class="col">
			<label class="form-label">Note</label>
		</div>
		<div class="col">
			<label class="form-label">Qty</label>
		</div>
		<div class="col">
			<label class="form-label">Harga</label>
		</div>
		<div class="col">
			<label class="form-label">Total</label>
		</div>
	</div>
	@php
		$tot = 0;
	@endphp
	@foreach ($orderDetails as $item)
		<input type="hidden" value="{{ $item->order->id }}" name="order_id[]">
		<div class="row mb-3">
			<div class="col">
				{{ $item->menu->name }}
			</div>
			<div class="col">
				{{ $item->note == '' ? '-' : $item->note }}
			</div>
			<div class="col">
				{{ $item->qty }}
			</div>
			<div class="col">Rp {{ number_format($item->menu->price) }}</div>
			<div class="col">Rp {{ number_format($item->menu->price * $item->qty) }}</div>
		</div>
		@php
			$tot += $item->menu->price * $item->qty;
		@endphp
	@endforeach
	<hr>
	<div class="row mb-3">
		<div class="col-10 d-flex justify-content-end"><b>Sub Total</b></div>
		<div class="col">
			<b>Rp {{ number_format($tot) }}</b>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-10 d-flex justify-content-end"><b>Discount</b></div>
		<div class="col">
			<b>{{ $item->order->discount }}%</b>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-10 d-flex justify-content-end"><b>Payment Method</b></div>
		<div class="col">
			<b>{{ ucfirst(trans($item->order->payment)) }}</b>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-10 d-flex justify-content-end"><b>Total</b></div>
		<div class="col">
			<b>Rp
				{{ number_format($tot - $tot * ($item->order->discount / 100)) }}</b>
		</div>
	</div>
	<hr>
</div>
