<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Satker;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $satker = Satker::orderBy('satker_id', 'asc')->paginate(10);
        return view('sdm::lookup.satker', compact('satker'));
    }

}
