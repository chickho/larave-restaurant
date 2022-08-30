@extends('templates.app')
@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<h1 class="page-title mt-5 text-center">
				History
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
										</td>
										<td class="d-flex justify-content-center">
											<div class="row">
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="#" data-toggle="modal" data-target='#myModal' data-id="{{ $order->slug }}" id="btnModal"
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
				</div>
				<div class="modal-footer">
					<!-- Rp. {{$orders ?? $orders['price']}} -->
				<p id='user_id'></p>

				</div>
				
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  $(document).on('click', '#btnModal', function() {
	   var id = $(this).attr('data-id');
	   $.get('history/' + id, function(data) {
	    $(".modal-body").html(data);
	   });
	  });
	 });
	</script>
@endpush
