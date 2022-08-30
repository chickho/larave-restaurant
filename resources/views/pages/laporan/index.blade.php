@extends('templates.app')
@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
				<h1 class="page-title mt-5 text-center">
					Laporan
				</h1>
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
	<div class="col-3 mb-2">
		<label for="null" class=''>Date</label><br>
		<div class="row form-group">
			<div class="col">
				<div class="input-group input-group-sm">
					<input class="flatpickr range form-control" id='dateRange' type="text"
					placeholder="Range">
				</div>
			</div>
			<div class="col">
				<button type="button" onClick="window.location.reload();" class="btn btn-danger btn-sm">Clear all</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
					<table id="Example" class="table card-table table-vcenter text-nowrap table-hover datatable">
					<thead>
								<tr>
									<th>No</th>
									<th>Menu</th>
									<th>Quantity</th>
									<th>Status</th>
									<th>Name Order</th>
									<th>Email</th>
									<th>Table</th>
									<th>Tanggal pemesanan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders_detail as $menu)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $menu->menu->name }}</td>
										<td>{{ $menu->qty }}</td>
										<td>{{ $menu->status }}</td>
										<td>{{ $menu->order->user->name }}</td>
										<td>{{ $menu->order->user->email }}</td>
										<td>{{ $menu->order->table->name }}</td>
										<td>{{ $menu->created_at->format('Y-m-d') }}</td>
										<td class="d-flex justify-content-center">
											<div class="row">
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="#" id='detailBtn' data-toggle="modal" data-target='#myModal' data_value="{{ $menu }}" id="btnModal"
														title="Detail">
														<i class="far fa-eye text-primary"></i>
													</a>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Detail</h4>
				</div>
				<div class="modal-body">
				<table class="table table-vcenter card-table table-striped">
					<thead>
						<tr>
							<th colspan="2" class="text-center">Name Customer</th>
							<th>Email</th>
							<th class="text-center">Pesanan</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Table</th>
							<th class="text-center">Price</th>
						</tr>
					</thead>
					<tbody id="data_modal">
						<tr>
							<td></td>
							<td id='name'></td>
							<td id='email'></td>
							<td id='pesanan'></td>
							<td id='quantity'></td>
							<td id='tables' class="text-center"></td>
							<td id='price' class="text-center"></td>
						</tr>
					</tbody>
				</table>
				</div>
				<div class="modal-footer">

				</div>
				
			</div>
		</div>
	</div>


@endsection

@push('scripts')
	<script>
		
		document.addEventListener("DOMContentLoaded", function() {

		$(document).on('click', '.btnDelete', function() {
		var form = $(this).closest("form");
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
			form.submit();
			}
		});
		});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#detailBtn').click(function(e) {
				console.log("button modal klik",JSON.parse($(this).attr('data_value')))
				let data = JSON.parse($(this).attr('data_value'));
				$(".modal-body #name").html(data.order.user.name);
				$(".modal-body #email").html(data.order.user.email);
				$(".modal-body #pesanan").html(data.menu.name);
				$(".modal-body #quantity").html(data.qty);
				$(".modal-body #tables").html(data.order.table.name);
				$(".modal-body #price").html(data.order.price);
        	});
		});
	</script>
@endpush
