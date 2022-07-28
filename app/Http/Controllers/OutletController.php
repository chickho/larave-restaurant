<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = auth()->user();
      return view('pages.outlet.index', ['outlets' => Outlet::all()->sortByDesc('id')],['role' => $user->role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.outlet.create');
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
				'address' => 'required'
			]);
	
			$validatedData['slug'] = Str::random(25);
	
			Outlet::create($validatedData);
	
			return redirect('/outlet')->with('success', 'Insert data successfull!');
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
    public function edit(Outlet $outlet)
    {
      return view('pages.outlet.edit', ['outlet' => $outlet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
      $validatedData = $request->validate([
				'name' => 'required|max:255',
				'address' => 'required'
			]);
	
			Outlet::where('id', $outlet->id)->update($validatedData);
	
			return redirect('/outlet')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
      Outlet::destroy($outlet->id);

			return redirect('/outlet')->with('success', 'Data has been deleted!');
    }
}
