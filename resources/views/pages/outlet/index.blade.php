@extends('templates.app')

@section('content')
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
				<h1 class="page-title mt-5 text-center">
					Outlet
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
				@if($role == 'admin')
					<div class="card-header">
						<div class="col-2">
							<a href="/outlet/create" class="btn btn-primary w-100">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
									stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<line x1="12" y1="5" x2="12" y2="19" />
									<line x1="5" y1="12" x2="19" y2="12" />
								</svg>
								Add
							</a>
						</div>
					</div>
				@endif
				<div class="card-body">
					<div class="table-responsive">
						<table id="Example" class="table card-table table-vcenter text-nowrap table-hover datatable">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th width="40%">Name</th>
									<th width="20%">Address</th>
									@if($role == 'admin')
										<th width="20%"></th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach ($outlets as $outlet)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $outlet->name }}</td>
										<td>{{ $outlet->address }}</td>
										@if($role == 'admin')
											<td>
												<div class="row">
													<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
														<a href="#" data-toggle="modal" data-target='#outlet{{ $outlet->slug }}'
															class="btn btn-outline-primary w-50 btn-icon" title="Detail">
															<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
																stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																<path stroke="none" d="M0 0h24v24H0z" fill="none" />
																<circle cx="12" cy="12" r="2" />
																<path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
															</svg>
														</a>
													</div>
													<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
														<a href="outlet/{{ $outlet->slug }}/edit" class="btn btn-outline-warning w-50 btn-icon" title="Edit">
															<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
																stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																<path stroke="none" d="M0 0h24v24H0z" fill="none" />
																<path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
																<path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
																<line x1="16" y1="5" x2="19" y2="8" />
															</svg>
														</a>
													</div>
													<div class="col-6 col-sm-4 col-md-2 col-xl-auto">
														<form action="outlet/{{ $outlet->slug }}" method="POST">
															@method('delete')
															@csrf
															<button class="btn btn-outline-danger btn-icon" title="Delete" onclick="return confirm('Are you sure?')">
																<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
																	stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																	<path stroke="none" d="M0 0h24v24H0z" fill="none" />
																	<line x1="4" y1="7" x2="20" y2="7" />
																	<line x1="10" y1="11" x2="10" y2="17" />
																	<line x1="14" y1="11" x2="14" y2="17" />
																	<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
																	<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
																</svg>
															</button>
														</form>
													</div>
												</div>
											</td>
										@endif
									</tr>

									<div class="modal modal-blur fade" id="outlet{{ $outlet->slug }}" tabindex="-1" role="dialog"
										aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Detail</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
															stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" />
															<line x1="18" y1="6" x2="6" y2="18" />
															<line x1="6" y1="6" x2="18" y2="18" />
														</svg>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-12 col-md-6 mb-3">
															<label class="form-label">Name</label>
															<input type="text" class="form-control" id="name" placeholder="Nama" value="{{ $outlet->name }}"
																readonly>
														</div>
														<div class="col-12 col-md-6 mb-3">
															<label class="form-label">Address</label>
															<textarea class="form-control" id="address" cols="30" rows="10"
																readonly>{{ $outlet->address }}</textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
