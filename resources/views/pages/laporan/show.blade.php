<div>
	<div class="table-responsive">
	<table class="table table-vcenter card-table table-striped">
		<thead>
			<tr>
				<th colspan="2" class="text-center">Name Customer</th>
				<th>Email</th>
				<th class="text-center">Pesanan</th>
				<th class="text-center">Qty</th>
				<th class="text-center">Status</th>
				<th class="text-center">Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td>{{$orders_detail->order->user->name}}</td>
				<td>{{$orders_detail->order->user->email}}</td>
				<td>{{$orders_detail->menu->name}}</td>
				<td class="text-center">{{$orders_detail->qty}}</td>
				<td class="text-center"><span class="badge @if ($orders_detail->order->status == 'ordered') bg-yellow @elseif($orders_detail->order->status == 'paid') bg-green @elseif($orders_detail->order->status == 'done') bg-blue @endif">{{ $orders_detail->order->status }}</span></td>
				<td class="text-center">{{$orders_detail->order->price}}</td>
			</tr>
		</tbody>
	</table>
</div>

