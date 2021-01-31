<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Makun;

class MakunController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $akun = Makun::orderBy('kdakun', 'asc')
            ->paginate(20);
        return view('anggaran::master.akun', compact('akun'));
    }
}
