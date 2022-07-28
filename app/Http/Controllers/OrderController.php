<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Voucher;
use App\Models\Payment;
use App\Models\UserVoucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = auth()->user();
		return view('pages.order.index', [
			'foods' => Menu::where('category', 'Makanan')->where('status', 'ready')->get(), 
			'beverages' => Menu::where('category', 'Minuman')->where('status', 'ready')->get(), 
			'snacks' => Menu::where('category', 'Snack')->where('status', 'ready')->get(),
			'tables' => Table::where('booked', 'no')->get(),
			'users' => $data,
		]);
	}

	public function qrcode($code)
	{
		return view('pages.order.index-qrcode', [
			'table' => Table::where('code', $code)->where('booked', 'no')->get(),
			'foods' => Menu::where('category', 'Makanan')->where('status', 'ready')->get(), 
			'beverages' => Menu::where('category', 'Minuman')->where('status', 'ready')->get(), 
			'snacks' => Menu::where('category', 'Snack')->where('status', 'ready')->get(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
			//
	}

	/**
	 * Show data to payment page.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function confirm(Request $request)
	{
		$now = Carbon::now()->format('Y-m-d');

		if($request['voucher'] != '' || $request['voucher'] != null){
			$validate = Voucher::where('code', $request['voucher'])->first();

			if($validate){
				if($validate['start'] >= $now || $now <= $validate['end']){
					return view('pages.order.payment', [
						'table_id' => $request['table_id'],
						'ids' => $request['id'],
						'names' => $request['name'],
						'images' => $request['image'],
						'prices' => $request['price'],
						'qtys' => $request['qty'],
						'notes' => $request['note'],
						'discount' => $validate['discount'],
						'payments' => Payment::all()->sortByDesc('id')
		]);
				}
				return back()->with('error', 'Voucher Expired')->withInput();
			} else {
				return back()->with('error', 'Voucher Tidak Tersedia')->withInput();
			}
		}

		return view('pages.order.payment', [
			'table_id' => $request['table_id'],
			'ids' => $request['id'],
			'names' => $request['name'],
			'images' => $request['image'],
			'prices' => $request['price'],
			'qtys' => $request['qty'],
			'notes' => $request['note'],
			'discount' => 0,
			'payments' => Payment::all()->sortByDesc('id')
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (!$request->get('qty')) {
			return redirect('/order')->with('error', 'Data not found!');
		}
		
		$sum = array();
		$validatedData = $request->validate([
			'table_id' => 'required',
			'payment' => 'required'
		]);

		$validatedData['slug'] = Str::random(25);
		$validatedData['user_id'] = auth()->user()->id;
		$validatedData['status'] = 'ordered';
		$validatedData['discount'] = $request['discount'];
		$validatedData['price'] = $request['price'];
		
		$order = Order::create($validatedData);
		$orderId = $order->id;
		foreach ($request["qty"] as $key => $qty) {
			OrderDetail::create([
				'order_id' => $orderId,
				'menu_id' => $request["id"][$key],
				'qty' => $qty,
				'status' => 'ordered',
				'note' => $request["note"][$key] == null ? '' : $request["note"][$key],
				'slug' => Str::random(25)
			]);
		}

		Table::where('id', $request['table_id'])->update(['booked' => 'yes']);

		UserVoucher::where('id', $request['userVoucherId'])->update(['used' => 'yes']);

		return redirect('/order')->with('success', 'Pemesanan sudah berhasil dan sedang di proses!');
	}

	public function showVoucher()
	{
		$data = UserVoucher::where('user_id', auth()->user()->id)->where('used', 'no')->get();
		return view('pages.order.detail', ['vouchers' => $data]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function show(Order $order)
	{
			//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Order $order)
	{
			//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Order $order)
	{
			//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Order $order)
	{
			//
	}
}
