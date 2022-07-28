@extends('templates.app')
@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Laporan
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item active" aria-current="page"><a href="#">Laporan</a></li>
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
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
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
	   $.get('menu/' + id, function(data) {
	    $(".modal-body").html(data);
	   });
	  });

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
@endpush
