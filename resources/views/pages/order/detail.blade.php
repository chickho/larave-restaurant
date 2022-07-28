<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
	@foreach ($vouchers as $voucher)
		<label class="form-selectgroup-item flex-fill">
			<input type="radio" name="voucher" value="{{ $voucher->voucher->discount }},{{ $voucher->id }}"
				class="form-selectgroup-input" required>
			<div class="form-selectgroup-label d-flex align-items-center p-3">
				<div class="mr-3">
					<span class="form-selectgroup-check"></span>
				</div>
				<div>
					{{ $voucher->voucher->name }}<br>
					<strong>{{ $voucher->voucher->discount }}%</strong>
				</div>
			</div>
		</label>
	@endforeach
</div>
<button type="submit" class="btn btn-primary w-100 mt-3" id="btnSubmit">Submit</button>
