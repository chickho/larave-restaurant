<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  public function index(){
		return view('auth.register');
	}

	public function store(Request $request){
		$validatedData =  $request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email:dns|unique:users',
			'password' => 'required|min:6|max:255',
		]);

		$validatedData['password'] = bcrypt($request->password);
		$validatedData['role'] = 'customer';
		$validatedData['point'] = 0;
		$validatedData['slug'] = Str::random(25);
		User::create($validatedData);
		return redirect('/login')->with('success', 'Registration successfull!');
	}
}
