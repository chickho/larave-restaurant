<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = auth()->user();
      return view('pages.payment.index', ['payment' => Payment::all()->sortByDesc('id')],['role' => $user->role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
				'name' => 'required|max:255',
			]);
	
			$validatedData['slug'] = Str::random(25);
			$validatedData['description'] = $request->get('description');
	
			Payment::create($validatedData);
	
			return redirect('/payments')->with('success', 'Insert data successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
      // return view('pages.outlet.show', ['outlet' => $outlet]);
      // ddd($outlet);
      // return Response::json($outlet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
      return view('pages.payment.edit', ['outlet' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
      $validatedData = $request->validate([
				'name' => 'required|max:255',
			]);
			$validatedData['description'] = $request->get('description');
	
			Payment::where('id', $payment->id)->update($validatedData);
	
			return redirect('/payments')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
      Payment::destroy($payment->id);

			return redirect('/payments')->with('success', 'Data has been deleted!');
    }
}
