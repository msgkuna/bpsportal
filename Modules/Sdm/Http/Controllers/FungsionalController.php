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
        $fungsional = Fungsional::orderBy('fungsional_id', 'asc')->paginate(10);
        return view('sdm::lookup.fungsional.index', compact('fungsional'));
    }
}
