<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages.table.index', ['tables' => Table::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.table.create');
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
				'name' => 'required',
				'capacity' => 'required',
				'booked' => 'required',
			]);
	
			$validatedData['slug'] = Str::random(25);
			$validatedData['code'] = Str::random(5);
	
			Table::create($validatedData);
	
			return redirect('/table')->with('success', 'Insert data successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
      return view('pages.table.show', ['table' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
      return view('pages.table.edit', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
      $validatedData = $request->validate([
				'name' => 'required',
				'capacity' => 'required',
				'booked' => 'required',
			]);
	
			Table::where('id', $table->id)->update($validatedData);
	
			return redirect('/table')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
      Table::destroy($table->id);

			return redirect('/table')->with('success', 'Data has been deleted!');
    }

    public function qrcode($id)
    {
      $table = Table::where('slug', $id)->first();

      return view('pages.table.qrcode', ['table' => $table]);
    }
}
