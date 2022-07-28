<div class="row">
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Name</label>
		<span>{{ $menu->name }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Category</label>
		<span>{{ $menu->category }}</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<label class="form-label">Price</label>
		<span>
			Rp&nbsp;{{ number_format($menu->price) }}
		</span>
	</div>
	<div class="col-12 col-md-6 mb-3">
		<div class="form-label" for="image">Image</div>
		<img src="{{ asset('storage/' . $menu->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
	</div>
</div>
