@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
				<h1 class="page-title mt-5 text-center">
					Role
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
									<th width="20%">Name</th>
									<th width="20%">Slug</th>
									<th width="20%">Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Admin</td>
									<td>admin</td>
									<td>admin role for admin</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Kitchen</td>
									<td>kitchen</td>
									<td>kitchen role for kitchen</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Cashier</td>
									<td>cashier</td>
									<td>cashier role for cashier</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Guest</td>
									<td>guest</td>
									<td>guest role for guest</td>
								</tr>
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

