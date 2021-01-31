<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Fungsional;

class FungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $fungsional = Fungsional::orderBy('fungsional_id', 'asc')->paginate(20);
        return view('sdm::master.fungsional.index', compact('fungsional'));
    }
}
