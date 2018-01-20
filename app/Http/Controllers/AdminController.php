<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tour;
use App\Booking;
use App\Payment;
use Carbon\Carbon;
use Landish\Pagination;
use App\Driver;
use Lava;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
	public function dashboard()
	{
		$user = User::count();
		$bookingPaid = Booking::where('status','=','Paid')->count();
		$bookingUnpaid = Booking::where('status','=','Unpaid')->count();
		$bookings = Booking::count();
		return view('/admin/dashboard',compact('user','bookingPaid','bookingUnpaid','bookings'));
	}

	public function index()
	{
		return view('admin.index');
	}

	public function driver()
	{
		//$booking = Booking::where('id',$id)->first();
		$drivers = Driver::all();
		$bookings = Booking::with('drivers')->where('status','=','Paid')->latest()->get();

		return view('admin.jadwal_driver' ,compact('drivers','bookings'));
	}

	public function driverCreate($id)
	{
		$booking = Booking::find($id);
		$drivers = Driver::all();
		return view('admin/add_driver',compact('drivers','booking'));
	}

	public function driverStore(Request $request, $id)
	{
		$request->drivers = array_unique(array_diff($request->drivers, [0]));

		if(empty($request->drivers))
				return  back()->withInput($request->input())->with('tours_error','driver harus di isi');
				$bookings = Booking::find($id);
				$bookings->drivers()->attach($request->input('drivers'));

				return  redirect('admin/jadwal_driver');
	}

	public function driverEdit($bookingId)
	{
		$bookings = Booking::find($bookingId);
		$drivers = Driver::all();

		return view('admin.edit_driver', compact('bookings','drivers'));
	}

	public function driverUpdate(Request $request, $bookingId)
	{

		$bookings = Booking::find($bookingId);
		$bookings->drivers()->sync($request->drivers);
		return redirect('admin/jadwal_driver')->with('success','Berhasil Update driver');

	}

	public function laporanDaftarPaket(Request $request)
	{
		$searchDari = Carbon::parse($request->tanggalDari);
		$searchKe = Carbon::parse($request->tanggalKe);

		$bookings = Booking::with('tours.bookings')->whereHas('tours',function ($query) use ($searchDari, $searchKe){
                $query->whereBetween(DB::raw('date(tanggal_liburan)'), [$searchDari,$searchKe]);
		})->where('status','=','Paid')->latest()->paginate(5);


		return view('admin.laporan_daftar_paket',compact('bookings'));
	}

	public function daftar_paket(Request $request)
	{
		$search = urldecode($request->input('search'));

		if (!empty($search)) {
		$bookings = Booking::with('tours')->where('status','=','unpaid')
					->whereHas('tours', function($query) use ($search){
						$query->where('tanggal_liburan','like','%'.$search.'%');
					})->latest()->paginate(5);
		}
		else{

		$bookings = Booking::with('tours')->where('status','=','unpaid')->latest()->paginate(5);

		}

		return view('admin.daftar_paket',compact('bookings','search'));
	}

	public function editDaftarPaket($id)
	{
		$bookings = Booking::find($id);
		$tours = Tour::all();
		//$drivers = Driver::all();

		return view('admin/edit_daftar_paket',compact('bookings','tours'));
	}

	public function updateDaftarPaket(Request $request, $id)
	{
		$this->validate($request,[

            'tanggal_liburan' => 'required',
        ]);
				/*$request->drivers = array_unique(array_diff($request->drivers, [0]));
				if(empty($request->drivers))
						return  back()->withInput($request->input())->with('tours_error','driver harus di isi');
				*/
        $bookings = Booking::find($id);
        $bookings->update([
        	'status' => $request->status,
        	'tanggal_liburan' => $request->tanggal_liburan,
        ]);
        $bookings->tours()->sync($request->tours);
				//$bookings->drivers()->attach($request->input('drivers'));
        return redirect('/admin/daftar_paket')->with('success','Berhasil Update Data Paket Liburan');
	}

    public function laporanDaftarPembyaran(Request $request)
    {
    	//$payments = Payment::with('booking')->latest()->get();
    	$search = urldecode($request->input('search'));

    	if (!empty($search)) {

    		$payments = Payment::with('booking')->whereHas('booking', function($query) use ($search){
						$query->where('nama_bank','like','%'.$search.'%')
							->orWhere('tanggal_liburan','like', '%'.$search.'%')
							->orWhere('subject','like', '%'.$search.'%')
							->orWhere('tgl_transfer','like', '%'.$search.'%');
					})->latest()->paginate(5);
    	}
    	else
	    	{
	    		$payments = Payment::with('booking')->latest()->paginate(5);
	    	}

    	return view('admin.pembayaran',compact('payments','search'));
    }
}
