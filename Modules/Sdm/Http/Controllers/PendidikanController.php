<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $didik = Pendidikan::orderBy('didik_id', 'asc')->paginate(20);
        return view('sdm::master.didik', compact('didik'));
    }

}
