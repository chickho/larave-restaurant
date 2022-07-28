<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$now = Carbon::now()->format('Y-m-d');
			$userVouchers = UserVoucher::select('voucher_id')->get();

			return view('pages.point.index', 
				['point' => User::where('id', auth()->user()->id)->first()], 
				['vouchers' => Voucher::where('start','<=',$now)->where('end','>=',$now)->whereNull('deleted_at')->whereNotIn('id', $userVouchers)->get()]
			);
    }

		public function buy(Request $request)
		{
			$voucher = Voucher::where('slug', $request['slug'])->first();
			$user = User::where('id', auth()->user()->id)->first();
			
			if($user->point < $voucher->price){
				return redirect('/point')->with('error', 'Point anda tidak mencukupi!');
			}

			$sisa = $user->point - $voucher->price;

			UserVoucher::create([
				'user_id' => auth()->user()->id,
				'voucher_id' => $voucher->id,
				'used' => 'no',
				'slug' => Str::random(25)
			]);

			User::where('id', auth()->user()->id)->update([
				'point' => $sisa
			]);

			return redirect('/point')->with('success', 'Voucher berhasil dibeli!');
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
