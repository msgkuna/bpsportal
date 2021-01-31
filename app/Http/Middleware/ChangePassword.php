<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            $user = $request->user();
            $password_changed_at = new Carbon(($user->password_updated_at) ? $user->password_updated_at : $user->created_at);

            if ($user->password_updated_at == null | (Carbon::now()->diffInDays($password_changed_at) >= 30)) {
                return redirect()->route('password.change')->withWarning('Password anda masih default/sudah kadaluarsa, harap segera diganti!');
            }
        }

        return $next($request);
    }
}
