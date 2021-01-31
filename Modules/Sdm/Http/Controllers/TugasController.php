<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Tugas as TugasModel;
use Modules\Sdm\Entities\Fungsional;
use Modules\Sdm\Entities\Jenjang;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pimpinan = TugasModel::where('jabatan_id','1')->paginate(20);
        $administrator = TugasModel::where('jabatan_id','2')->paginate(20);
        $fungsional = TugasModel::where('jabatan_id','3')->paginate(20);
        return view('sdm::master.tugas.index',compact('pimpinan', 'administrator', 'fungsional'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $fungsional = Fungsional::orderBy('fungsional_id', 'ASC')->get();
        $jenjang = Jenjang::orderBy('jenjang_id', 'ASC')->get();
        return view('sdm::master.tugas.create',[
            'fungsional' => $fungsional,
            'jenjang' => $jenjang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required|numeric|digits:1',
            'tugas_id' => 'required|numeric|digits:5',
            'uraian' => 'required',
        ]);

        $tab = $request->get('tab');
        try {
            TugasModel::create($request->all());
            return redirect()->route('tugas.index')
                            ->with('success','Data '. $request->uraian .' telah ditambahkan.')->withInput(['tab'=>$tab]);
        } catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->route('tugas.index')
                    ->withError('Data duplikat.')->withInput(['tab'=>$tab]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        TugasModel::where([
            ['jabatan_id','=',$request->jabatan],
            ['tugas_id', '=', $request->tugas],
        ])->delete();

        return redirect()->route('tugas.index')
                        ->withSuccess('Data telah di hapus');
    }
}
