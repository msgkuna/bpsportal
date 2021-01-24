<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'flag' => '1'])) {
            $user = Auth::user();
            $user->timestamps = false;
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->ip();
            $user->save();

            return redirect()->intended('home')
                ->with('success', 'Selamat datang kembali '. $user->pegawai->nama .' di Kompak BPS Kalimantan Tengah');
        }
        return redirect()->back()->with(['error' => 'Password Invalid / Inactive Users']);
    }
}
