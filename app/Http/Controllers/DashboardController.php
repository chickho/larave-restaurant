<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function voucher()
	{
    $now = Carbon::now()->format('Y-m-d');

		return view('pages.dashboard',['menus' => Menu::all()->sortByDesc('id')]);
	}
}