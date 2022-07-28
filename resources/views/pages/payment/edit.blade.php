@extends('templates.app')
@section('content')
  <div class="container-xl">
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="page-title">
            Payment
          </h2>
          <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="/payments">Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-2">
              <a href="/payments" class="btn btn-warning w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <line x1="5" y1="12" x2="19" y2="12" />
                  <line x1="5" y1="12" x2="11" y2="18" />
                  <line x1="5" y1="12" x2="11" y2="6" />
                </svg>
                Back
              </a>
            </div>
          </div>
          <div class="card-body">
            <form action="/payments/{{ $outlet->slug }}" method="POST">
              @method('put')
              @csrf
              <div class="row">
                <div class="col-12 col-md-6 mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ $outlet->name }}">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                  <label class="form-label">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30"
                    rows="10">{{ $outlet->description }}</textarea>
                    @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-success w-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                    <circle cx="12" cy="14" r="2" />
                    <polyline points="14 4 14 8 8 8 8 4" />
                  </svg>
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
