<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = auth()->user()->role;
      return view('pages.user.index', ['users' => User::all()->sortByDesc('id')], ['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.user.create');
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
				'email' => 'required|email:dns|unique:users',
				'password' => 'required|min:6|max:255',
				'role' => 'required'
			]);
	
			$validatedData['password'] = Hash::make($validatedData['password']);
			$validatedData['slug'] = Str::random(25);
			$validatedData['point'] = $validatedData['point'] ?? 0;
	
			User::create($validatedData);
	
			return redirect('/user')->with('success', 'Insert data successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::where('slug', $id)->first();
      return view('pages.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$user = User::where('slug', $id)->first();
      return view('pages.user.edit', ['user' => $user]);
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
      $validatedData = $request->validate([
        'name' => 'required|max:255',
				'email' => 'required',
				'role' => 'required',
        'point' => ''
			]);
	
			User::where('slug', $id)->update($validatedData);
	
			return redirect('/user')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::where('slug', $id)->delete();

			return redirect('/user')->with('success', 'Data has been deleted!');
    }
}
