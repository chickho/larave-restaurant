@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
				<h1 class="page-title mt-5 text-center">
					Cashier
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
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="Example" class="table card-table table-vcenter text-nowrap table-hover datatable">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th width="20%">Order Date</th>
									<th width="20%">Table</th>
									<th width="20%" class="text-center">Status</th>
									<th width="20%"></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $order)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
										<td>{{ $order->table->name }}</td>
										<td class="text-center">
											<span class="badge @if ($order->status == 'ordered') bg-yellow @elseif($order->status == 'paid') bg-green @elseif($order->status == 'done') bg-blue @endif">
												{{ $order->status }}
											</span>
											@if($order->status == 'paid')
												<span class="badge @if($order->status == 'paid') bg-yellow @endif ml-1">
													On Progress by chief
												</span>
											@endif
										</td>
										<td class="d-flex justify-content-center">
											<div class="row">
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="#" title="Detail" data-toggle="modal" id="idbtn3" data-target="#myModal"
														data-id="{{ $order->slug }}">
														<i class="fas fa-eye fa-fw me-1 text-primary"></i>
													</a>
												</div>
												@if ($order->status == 'ordered')
													<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
														<a href="cashier/paid/{{ $order->slug }}" title="Konfirmasi Pembayaran">
															<i class="fas fa-check fa-fw me-1 text-success"></i>
														</a>
													</div>
												@endif
												@if ($order->status == 'paid' && $role != 'admin')
													<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
														<form action="cashier/status/{{ $order->slug }}" method="POST">
															@method('post')
															@csrf
															<button class="btn w-0 ml-1 btnDone" style="padding: 0 !important; box-shadow: none !important;"
																title="Done">
																<i class="fas fa-check fa-fw me-1 text-success"></i>
															</button>
														</form>
													</div>
												@endif
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
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Detail</h4>
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
	   var id = $(this).attr('data-id');
	   $.get('/cashier/' + id, function(data) {
	    $(".modal-body").html(data);
	   });
	  });
	 });
	</script>
@endpush
