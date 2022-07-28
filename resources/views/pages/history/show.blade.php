<div>
	<div class="table-responsive">
	<table class="table table-vcenter card-table table-striped">
		<thead>
			<tr>
				<th colspan="2" class="text-center">Pesanan</th>
				<th>Note</th>
				<th class="text-center">Qty</th>
				<th class="text-center">Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orderDetails as $item)
				<tr>
					<td width="10%"><img src="{{ asset('storage/' . $item->menu->image) }}" style="width: 50px;" /></td>
					<td>{{ $item->menu->name }}</td>
					<td>{{ $item->note }}</td>
					<td class="text-center">{{ $item->qty }}</td>
					<td class="text-center"><span class="badge @if ($item->status == 'ordered') bg-yellow @elseif($item->status == 'paid') bg-green @elseif($item->status == 'done') bg-blue @endif">{{ $item->status }}</span></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

