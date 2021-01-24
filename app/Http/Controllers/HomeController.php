<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(
        //     app('auth')->user()->getAllPermissions()->toArray(),
        //     app('auth')->user()->can('delete-user'),
        //     app('auth')->user()->hasPermissionTo('add-user')
        // );
        return view('home');
    }

    public function show(Request $request)
    {
        return view('profile.show', [
            'user' => $request->user()
        ]);
    }

}
