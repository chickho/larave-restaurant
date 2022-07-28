<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
		public function index(){
			return view('auth.login');
	}

	public function authenticate(Request $request){
		$credentials = $request->validate([
			'email' => 'required|email:dns',
			'password' => 'required',
		]);

		if(Auth::attempt($credentials)){
			$request->session()->regenerate();
			return redirect()->intended('/');
		}

		return back()->with('loginError', 'Email atau password salah!');
	}

	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

	public function guestLogin(Request $request){
		return view('auth.guestLogin');
	}

	public function guestData(Request $request){
		$validatedData =  $request->validate([
			'name' => 'required|max:255',
			// 'email' => 'required|email:dns|unique:users',
			'email' => 'required|email',
		]);

		$data_user = User::where('email', $request->get('email'))->first();
		if (!$data_user) {
			$validatedData['password'] = bcrypt('123456');
			$validatedData['role'] = 'guest';
			$validatedData['point'] = null;
			$validatedData['slug'] = Str::random(25);
			User::create($validatedData);
		}

		
		$request->replace([
			'email' => $validatedData['email'],
			'password' => '123456'
		]);

		return $this->authenticate($request);
	}
}
