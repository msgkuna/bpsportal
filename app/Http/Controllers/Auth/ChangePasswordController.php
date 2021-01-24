<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ChangePasswordController extends Controller
{
    public function change()
    {
        return view('auth.password');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password')),
            'password_updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('home')->with(['success' => 'Password telah berhasil di ubah']);
    }

}
