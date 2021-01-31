<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Dept;

class MdeptController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $dept = Dept::orderBy('kddept', 'asc')
            ->paginate(20);
        return view('anggaran::master.dept', compact('dept'));
    }
}
