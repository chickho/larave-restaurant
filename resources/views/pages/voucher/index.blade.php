@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<h1 class="page-title mt-5 text-center">
				List Voucher
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
				<div class="card-header">
					<div class="col-2">
						<a href="/voucher/create" class="btn btn-primary w-100">
							<i class="fas fa-plus"></i>
							&nbsp;&nbsp;Add
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="Example" class="table card-table table-vcenter text-nowrap table-hover datatable">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th width="20%">Name</th>
									<th width="20%">Code</th>
									<th width="10%">Discount</th>
									<th width="10%">Start</th>
									<th width="10%">End</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($vouchers as $voucher)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $voucher->name }}</td>
										<td>{{ $voucher->code }}</td>
										<td>{{ $voucher->discount }}</td>
										<td>{{ date('d-m-Y', strtotime($voucher->start)) }}</td>
										<td>{{ date('d-m-Y', strtotime($voucher->end)) }}</td>
										<td class="d-flex justify-content-center">
											<div class="row">
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="#" data-toggle="modal" data-target='#myModal' data-id="{{ $voucher->slug }}" id="btnModal"
														title="Detail">
														<i class="far fa-eye text-primary"></i>
													</a>
												</div>
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="voucher/{{ $voucher->slug }}/edit" title="Edit">
														<i class="far fa-edit text-warning"></i>
													</a>
												</div>
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<form action="voucher/{{ $voucher->slug }}" method="POST">
														@method('delete')
														@csrf
														<button class="btn w-0 ml-1 btnDelete" style="padding: 0 !important; box-shadow: none !important;"
															title="Delete" data-type="confimDelete">
															<i class="far fa-trash-alt text-danger"></i>
														</button>
													</form>
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
		<div class="modal-dialog" role="document">
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
	  $(document).on('click', '#btnModal', function() {
	   var id = $(this).attr('data-id');
	   $.get('voucher/' + id, function(data) {
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
