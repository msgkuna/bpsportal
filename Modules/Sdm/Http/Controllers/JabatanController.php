<?php

namespace Modules\Sdm\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $jabatan = Jabatan::orderBy('jabatan_id', 'asc')->paginate(10);
        return view('sdm::lookup.jabatan', compact('jabatan'));
    }

}
