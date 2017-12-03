<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Booking;
use App\Tour;
use App\Payment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $userCount = User::count();
        return view('admin/index',compact('users','userCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function HistoryUser($id)
    {
       //$users = User::with('bookings.tours')->findOrFail($id);
       //return $users->latest();
        $users  = User::with(array('bookings' =>function($query){
            $query->orderBy('id','DESC');
        }))->findOrFail($id);

        return view('user/history', compact('users'));
    }

    public function historyBooking($id)
    {
      $users  = User::with(array('bookings' =>function($query){
          $query->orderBy('id','DESC');
      }))->findOrFail($id);

      return view('user/history_booking', compact('users'));
    }

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
        $user = User::where('id',$id)->first();
        // dd($user);
        return view('user.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        //dd($user);
        return view('user.edit' ,compact('user'));
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
        $this->validate($request,[

            'name' => 'required|min:3',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
                'name' => $request->name,
                'emai' => $request->email,
            ]);
        return redirect()->action('UserController@show',['id'=>$id])->with('success','berhasil update user');
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
