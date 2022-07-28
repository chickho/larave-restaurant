<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages.voucher.index', ['vouchers' => Voucher::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.voucher.create');
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
				'code' => 'required',
				'discount' => 'required',
				'start' => 'required',
				'end' => 'required',
        'image' => 'image'
			]);

      if($request->file('image')){
        $validatedData['image'] = $request->file('image')->store('voucher-images');
      }
	
			$validatedData['slug'] = Str::random(25);
			$validatedData['price'] =$request->get('price');
	
			Voucher::create($validatedData);
	
			return redirect('/voucher')->with('success', 'Insert data successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
      return view('pages.voucher.show', ['voucher' => $voucher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
      return view('pages.voucher.edit', ['voucher' => $voucher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
      $validatedData = $request->validate([
				'name' => 'required|max:255',
				'code' => 'required',
				'discount' => 'required',
				'start' => 'required',
				'end' => 'required',
        'image' => 'image'
			]);

      if($request->file('image')){
        if($request->oldImage){
          Storage::delete($request->oldImage);
        }
        $validatedData['image'] = $request->file('image')->store('voucher-images');
      }
	
			Voucher::where('id', $voucher->id)->update($validatedData);
	
			return redirect('/voucher')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
      Voucher::destroy($voucher->id);

			return redirect('/voucher')->with('success', 'Data has been deleted!');
    }
}
