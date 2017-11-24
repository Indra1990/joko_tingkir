<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Alert;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }*/

    public function field()
    {
        if (filter_var(request()->username, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
        else
        {
            return 'username';
        }
    }

    public function login()
    {
        if (Auth::attempt([$this->field() =>request()->username, 'password' =>request()->password]) && Auth::user()->role == 1 )
        {
                Alert::success('Selamat Anda Berhasil Login!','Successfully');
                return redirect()->intended('/home');
        }
        elseif(Auth::attempt([$this->field() =>request()->username, 'password' =>request()->password]) && Auth::user()->role == 2 && Auth::user()->username == "admin paket wisata")
        {
                Alert::success('Selamat Anda Berhasil Login!','Successfully');
                return redirect()->intended('admin/dashboard');
        }
        elseif(Auth::attempt([$this->field() =>request()->username, 'password' =>request()->password]) && Auth::user()->role == 2 && Auth::user()->username == "pengemudi")
        {
                Alert::success('Selamat Anda Berhasil Login!','Successfully');
                return redirect()->intended('admin/jadwal_driver');
        }

        else
        {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Periksa kembali email , username, atau password anda',
            ]);
        }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
