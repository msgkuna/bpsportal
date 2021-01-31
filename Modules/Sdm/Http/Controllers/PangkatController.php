<?php

namespace Modules\Sdm\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Pangkat;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $pangkat = Pangkat::orderBy('pangkat_id', 'asc')->paginate(20);
        return view('sdm::master.pangkat', compact('pangkat'));
    }

}
