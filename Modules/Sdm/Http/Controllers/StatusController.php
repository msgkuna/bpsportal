<?php

namespace Modules\Sdm\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $status = Status::orderBy('status_id', 'asc')->paginate(20);
        return view('sdm::master.status', compact('status'));
    }

}
