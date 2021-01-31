<?php

namespace Modules\Pengguna\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna::index');
    }
}
