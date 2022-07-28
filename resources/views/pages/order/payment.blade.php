@extends('templates.app')
@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Payment
				</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="/order" method="POST">
						@csrf
						<div class="table-responsive">
							<table class="table table-vcenter card-table table-striped">
								<thead>
									<tr>
										<th colspan="2" class="text-center">Pesanan</th>
										<th>Note</th>
										<th class="text-center">Qty</th>
										<th class="text-right">Harga</th>
										<th class="text-right">Total</th>
									</tr>
								</thead>
								<tbody>
									<input type="hidden" value="{{ $table_id }}" name="table_id" id="table_id">
									<input type="hidden" value="{{ $discount }}" name="discount" id="discountData">
									<input type="hidden" value="0" name="userVoucherId" id="userVoucherId">
									@php
										$tot = 0;
									@endphp
									@foreach ($qtys as $key => $qty)
										@if ($qty != null || $qty != 0)
											<input type="hidden" value="{{ $qty }}" name="qty[]">
											<input type="hidden" value="{{ $ids[$key] }}" name="id[]">
											<input type="hidden" value="{{ $notes[$key] }}" name="note[]">
											<tr>
												<td width="10%"><img src="{{ asset('storage/' . $images[$key]) }}" style="width: 50px;" /></td>
												<td>{{ $names[$key] }}</td>
												<td>{{ $notes[$key] }}</td>
												<td class="text-center">{{ $qty }}</td>
												<td class="text-right">Rp {{ number_format($prices[$key]) }}</td>
												<td class="text-right">Rp {{ number_format($prices[$key] * $qty) }}</td>
												@php
													$tot += $prices[$key] * $qty;
												@endphp
											</tr>
										@endif
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td colspan="5" class="text-right"><b>Sub Total</b></td>
										<td class="text-right">Rp {{ number_format($tot) }}</td>
										<input type="hidden" value="{{ $tot }}" id="ca">
									</tr>
									<tr>
										<td colspan="5" class="text-right"><b>Discount</b></td>
										<td class="text-right" id="cd">{{ $discount }}%</td>
									</tr>
									<tr>
										<td colspan="5" class="text-right"><b>Total</b></td>
										<td class="text-right" id="cx"><b>Rp {{ number_format($tot - $tot * ($discount / 100)) }}</b></td>
										<input type='hidden' value='{{ number_format($tot - $tot * ($discount / 100)) }}' name='price'>
									</tr>
								</tfoot>
							</table>
						</div>
						<br>
						@can('customer')
							<div class="row">
								<div class="col-2 mb-3">
									<button type="button" class="btn-modal btn btn-primary w-100" data-toggle="modal" id="idbtn3"
										data-target="#myModal">Gunakan Voucher</button>
								</div>
							</div>
						@endcan
						<div class="row">
							<div class="col-12 mb-3">
								<label class="form-label">Payment method</label>
								<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
									<div class="row">
										@foreach ($payments as $pay)
										<div class="col-6">
											<label class="form-selectgroup-item flex-fill">
												<input type="radio" name="payment" value="{{$pay->name}}" class="form-selectgroup-input" checked>
												<div class="form-selectgroup-label d-flex align-items-center p-3">
													<div class="mr-3">
														<span class="form-selectgroup-check"></span>
													</div>
													<div>{{$pay->name}}</div>
												</div>
											</label>
										</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="col-6">
								<button type="submit" class="btn btn-success w-100">
									<i class="far fa-save"></i>
									&nbsp;&nbsp;Order
								</button>
							</div>
							<div class="col-6">
								<a href="/order" class="btn btn-warning w-100">
									<i class="fas fa-arrow-left"></i>
									&nbsp;&nbsp;Back
								</a>
							</div>
						</div>
					</form>
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
					<h4 class="modal-title" id="myModalLabel">List Voucher</h4>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  $(document).on('click', '#idbtn3', function() {
	   var table_id = $('#table_id').val();
	   $.get('/order-voucher', function(data) {
	    $(".modal-body").html(data);
	   });
	  });

	  $('#myModal').on('click', '#btnSubmit', function() {
	   var voucherValue = $('input[name="voucher"]:checked').val() || 0;
	   var split = voucherValue.split(",");

	   var ca = $('#ca').val();

	   $('#discountData').val(split[0]);
	   $('#userVoucherId').val(split[1]);

	   $('#cd').text(split[0] + '%').wrapInner("<strong />");

	   var cx = ca - (ca * (split[0] / 100));
	   var i = new Intl.NumberFormat('id-ID', {
	    style: 'currency',
	    currency: 'IDR',
	    minimumFractionDigits: 0
	   }).format(cx);
	   $('#cx').text(i).wrapInner("<strong />");

	   $('#myModal .close').trigger('click');

	  });
	 });
	</script>
@endpush
