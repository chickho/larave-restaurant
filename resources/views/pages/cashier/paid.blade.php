@extends('templates.app')

@section('content')
	<div class="page-header d-print-none">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">
					Detail
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item"><a href="/cashier">Cashier</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="#">Detail</a></li>
				</ol>
			</div>
		</div>
	</div>

	@if (session()->has('success'))
		<div class="alert alert-important alert-success alert-dismissible" role="alert">
			<div class="d-flex">
				<div>
				</div>
				<div>
					{{ session('success') }}
				</div>
			</div>
			<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
		</div>
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="col-2">
						<a href="/cashier" class="btn btn-warning w-100">
							<i class="fas fa-arrow-left fa-fw me-1"></i>&nbsp;Back
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-end">
						<button type="button" title="Tambah" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							<i class="fas fa-plus fa-fw me-1"></i>&nbsp;Tambah
						</button>
					</div>
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
							<div class="col-auto text-center" style="min-width:56px">
								<label class="form-label">Hapus</label>
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
								<div class="col-auto text-center delete" style="min-width:56px">
									<form action="/cashier/{{ $item->slug }}" method="POST" id="deleteForm">
										@method('delete')
										@csrf
										<button class="btn w-0 ml-1 btnDelete" style="padding: 0 !important; box-shadow: none !important;"
											title="Delete" data-type="confimDelete">
											<i class="fas fa-trash-alt fa-fw me-1 text-danger"></i>
										</button>
									</form>
								</div>
							</div>
							@php
								$tot += $item->menu->price * $item->qty;
							@endphp
						@endforeach
						<hr>
						<div class="row mb-3">
							<div class="col d-flex justify-content-end"><b>Sub Total</b></div>
							<div class="col-2">
								<b>Rp {{ number_format($tot) }}</b>
							</div>
							<div class="col-1">&nbsp;</div>
						</div>
						<div class="row mb-3">
							<div class="col d-flex justify-content-end"><b>Discount</b></div>
							<div class="col-2">
								<b>{{ $item->order->discount }}%</b>
							</div>
							<div class="col-1">&nbsp;</div>
						</div>
						<div class="row mb-3">
							<div class="col d-flex justify-content-end"><b>Payment Method</b></div>
							<div class="col-2">
								<b>{{ ucfirst(trans($item->order->payment)) }}</b>
							</div>
							<div class="col-1">&nbsp;</div>
						</div>
						<div class="row mb-3">
							<div class="col d-flex justify-content-end"><b>Total</b></div>
							<div class="col-2">
								<b>Rp
									{{ number_format($tot - $tot * ($item->order->discount / 100)) }}</b>
							</div>
							<div class="col-1">&nbsp;</div>
						</div>
						<hr>
					</div>
				</div>
				<div class="card-footer">
					<div class="mb-3 d-flex justify-content-end">
						<form action="/cashier/{{ request()->slug }}" method="POST" id="paidForm">
							@method('put')
							@csrf
							<button class="btn btn-success" title="Paid"><i class="fas fa-receipt fa-fw me-1"></i>&nbsp;Paid
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Order</h4>
				</div>
				<div class="modal-body">
					<form action="/cashier" method="post">
						@csrf
						<input type="hidden" name="order" value="{{ request()->slug }}">
						<div class="row">
							<div class="col-6 mb-3">
								<label class="form-label">Pesanan</label>
								<select name="menu" class="form-select">
									<optgroup label="Makanan">
										@foreach ($foods as $food)
											<option value="{{ $food->id }}">{{ $food->name }}</option>
										@endforeach
									</optgroup>
									<optgroup label="Minuman">
										@foreach ($beverages as $beverage)
											<option value="{{ $beverage->id }}">{{ $beverage->name }}</option>
										@endforeach
									</optgroup>
									<optgroup label="Snack">
										@foreach ($snacks as $snack)
											<option value="{{ $snack->id }}">{{ $snack->name }}</option>
										@endforeach
									</optgroup>
								</select>
							</div>
							<div class="col-6 mb-3">
								<label class="form-label">Qty</label>
								<input type="number" class="form-control" name="qty" required>
							</div>
							<div class="col-6 mb-3">
								<label class="form-label">Note</label>
								<textarea class="form-control" name="note" cols="30" rows="10"></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  $(document).on('click', '.btnDelete', function() {
	   //  var form = $('#deleteForm').closest("form");
	   event.preventDefault();
	   Swal.fire({
	    title: 'Are you sure to Delete it?',
	    text: "You won't be able to revert data!",
	    icon: 'warning',
	    showCancelButton: true,
	    confirmButtonText: 'Yes, delete it!',
	    reverseButtons: true,
	    buttonsStyling: false,
	    customClass: {
	     confirmButton: 'btn btn-danger warning mx-2',
	     cancelButton: 'btn btn-secondary  mx-2',
	    },
	   }).then((result) => {
	    if (result.isConfirmed) {
	     $('#deleteForm').submit();
	    }
	   });
	  });
	 });
	</script>
@endpush
