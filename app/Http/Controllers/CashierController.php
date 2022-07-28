<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Menu;
use App\Models\User;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = auth()->user();
      return view('pages.cashier.index', ['orders' => Order::all()->sortByDesc('id')],['role' => $data->role]);
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
      $orderId = Order::where('slug', $request['order'])->first();

			OrderDetail::create([
				'order_id' => $orderId['id'],
				'menu_id' => $request['menu'],
				'qty' => $request['qty'],
				'status' => 'ordered',
				'note' => $request['note'] == null ? '' : $request['note'],
				'slug' => Str::random(25)
			]);

			return back()->with('success', 'Data has been updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paid($id)
    {
      $order = Order::where('slug', $id)->get();
			$orderDetail = OrderDetail::where('order_id', $order[0]['id'])->get();
      $food = Menu::where('category', 'Makanan')->get();
			$beverage = Menu::where('category', 'Minuman')->get();
			$snack = Menu::where('category', 'Snack')->get();
			
      return view('pages.cashier.paid', [
        'orderDetails' => $orderDetail,
        'foods' => $food,
        'beverages' => $beverage,
        'snacks' => $snack
      ]);
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
      $food = Menu::where('category', 'Makanan')->get();
			$beverage = Menu::where('category', 'Minuman')->get();
			$snack = Menu::where('category', 'Snack')->get();
			
      return view('pages.cashier.show', [
        'orderDetails' => $orderDetail,
        'foods' => $food,
        'beverages' => $beverage,
        'snacks' => $snack
      ]);
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
			Order::where('slug', $id)->update(['status' => 'paid']);

      $orderDetail = OrderDetail::with('menu')->where('order_id', $order[0]['id'])->get();

      $sum = 0;
      
      if (auth()->user()->role == 'customer') {
        foreach ($orderDetail as $key => $item) {
          $sum += $item->menu['price'] * $item->qty;
        }

        $total = $sum - ($sum * ($order[0]['discount']/100));

        $user = User::where('id', $order[0]['user_id'])->first();

        $point = $user->point + ($total / 1000);

        User::where('id', $order[0]['user_id'])->update(['point' => $point]);
      }

			OrderDetail::where('order_id', $order[0]['id'])->update(['status' => 'paid']);
	
			return redirect('/cashier')->with('success', 'Order has been paid!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $orderDetailId = OrderDetail::where('slug', $id)->first();

			OrderDetail::destroy($orderDetailId['id']);

			return back()->with('success', 'Data has been deleted!');
    }

    public function status($id)
    {
      $order = Order::where('slug', $id)->get();
      Table::where('id', $order[0]['table_id'])->update(['booked' => 'no']);
			Order::where('slug', $id)->update(['status' => 'done']);

			OrderDetail::where('order_id', $order[0]['id'])->update(['status' => 'done']);
	
			return redirect('/cashier')->with('success', 'Order is done!');
    }
}
