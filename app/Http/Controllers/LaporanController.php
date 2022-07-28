<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.laporan.index', ['menus' => Menu::all()->sortByDesc('id')], ['orders_detail' => OrderDetail::with('menu')->with('order')->with('order.user')->with('order.table')->get()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pages.menu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function show(Menu $menu)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Menu $menu)
	{
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Menu $menu)
	{
		
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Menu $menu)
	{
		
	}

	public function sold($id)
	{
		
	}

	public function ready($id)
	{
	}
}
