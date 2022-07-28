<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user();
		return view('pages.kitchen.index', ['orders' => Order::where('status', 'paid')->get()],['role' => $role->role]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$order = Order::where('slug', $id)->get();
			$orderDetail = OrderDetail::where('order_id', $order[0]['id'])->get();
			
      return view('pages.kitchen.show', ['orderDetails' => $orderDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$order = Order::where('slug', $id)->get();
            $id_tabel = $order[0]['table_id'];
            $table = Table::where('id', $id_tabel)->update(['booked' => 'no']);
			Order::where('slug', $id)->update(['status' => 'done']);

			OrderDetail::where('order_id', $order[0]['id'])->update(['status' => 'done']);
	
			return redirect('/kitchen')->with('success', 'Order is done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
