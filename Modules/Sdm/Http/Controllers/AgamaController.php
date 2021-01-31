<?php
namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Sdm\Entities\Agama;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $agama = Agama::orderBy('agama_id', 'asc')->paginate(20);
        return view('sdm::master.agama', compact('agama'));
    }
}
