<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Program;

class MprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $program = Program::orderBy('kddept', 'asc')
            ->orderBy('kdunit', 'asc')
            ->orderBy('kdprogram', 'asc')
            ->paginate(20);
        return view('anggaran::master.program', compact('program'));
    }
}
