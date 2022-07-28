@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					User
				</h2>
				<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
					<li class="breadcrumb-item active" aria-current="page"><a href="#">User</a></li>
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
						<a href="/user/create" class="btn btn-primary w-100">
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
									<th width="20%">Email</th>
									<th width="20%">Role</th>
									<th width="10%">Point</th>
									<th width="20%"></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->role }}</td>
										<td>{{ $user->point == null ? '0' : $user->point }}</td>
										<td class="d-flex justify-content-center">
											<div class="row">
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="#" data-toggle="modal" data-target='#myModal' data-id="{{ $user->slug }}" id="btnModal"
														title="Detail">
														<i class="far fa-eye text-primary"></i>
													</a>
												</div>
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<a href="user/{{ $user->slug }}/edit" title="Edit">
														<i class="far fa-edit text-warning"></i>
													</a>
												</div>
												<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
													<form action="user/{{ $user->slug }}" method="POST">
														@method('delete')
														@csrf
															@if($role == 'admin' && $user->role != 'admin')
																<button class="btn w-0 ml-1 btnDelete" style="padding: 0 !important; box-shadow: none !important;"
																	title="Delete" data-type="confimDelete">
																	<i class="far fa-trash-alt text-danger"></i>
																</button>
															@endif
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

