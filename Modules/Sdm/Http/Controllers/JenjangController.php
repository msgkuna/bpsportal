<?php

namespace Modules\Sdm\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Jenjang;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $jenjang = Jenjang::orderBy('jenjang_id', 'asc')->paginate(20);
        return view('sdm::master.fungsional.jenjang', compact('jenjang'));
    }
}
