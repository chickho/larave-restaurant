<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.menu.index', ['menus' => Menu::all()->sortByDesc('id')]);
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
		$validatedData = $request->validate([
			'name' => 'required',
			'category' => 'required',
			'price' => 'required',
			'image' => 'image|file'
		]);
		
		if($request->file('image')){
			$validatedData['image'] = $request->file('image')->store('menu-images');
		}

		$validatedData['slug'] = Str::random(25);
		$validatedData['status'] = 'ready';

		Menu::create($validatedData);

		return redirect('/menu')->with('success', 'Insert data successfull!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function show(Menu $menu)
	{
		return view('pages.menu.show', ['menu' => $menu]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Menu $menu)
	{
		return view('pages.menu.edit', ['menu' => $menu]);
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
		$validatedData = $request->validate([
			'name' => 'required',
			'category' => 'required',
			'price' => 'required',
			'image' => 'image|file'
		]);

		if($request->file('image')){
			if($request->oldImage){
				Storage::delete($request->oldImage);
			}
			$validatedData['image'] = $request->file('image')->store('menu-images');
		}

		Menu::where('id', $menu->id)->update($validatedData);

		return redirect('/menu')->with('success', 'Data has been updated!');
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Menu  $menu
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Menu $menu)
	{
		Menu::destroy($menu->id);

		return redirect('/menu')->with('success', 'Data has been deleted!');
	}

	public function sold($id)
	{
		Menu::where('slug', $id)->update(['status' => 'sold']);

		return redirect('/menu')->with('success', 'Data has been updated!');
	}

	public function ready($id)
	{
		Menu::where('slug', $id)->update(['status' => 'ready']);

		return redirect('/menu')->with('success', 'Data has been updated!');
	}
}
