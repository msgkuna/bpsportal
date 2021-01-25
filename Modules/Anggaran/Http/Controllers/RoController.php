<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dro;

class RoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dro = Dro::orderBy('kdprogram', 'asc')
        ->orderBy('kdgiat','asc')
        ->orderBy('kdoutput','asc')
        ->orderBy('kdsoutput','asc')
        ->paginate(10);
        return view('anggaran::upload.ro.index',compact('dro'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::upload.ro.upload');
    }

    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xml|max:2048',
        ]);

        $UploadfileName = $request->file->getClientOriginalName();
        $fileName = time().'_'.$UploadfileName;
        $pathFile = public_path('temp');
        $request->file->move($pathFile, $fileName);
        $xmlObject = new \SimpleXMLElement(file_get_contents($pathFile.'/'.$fileName));

        DB::beginTransaction();
        try {
            $data=array();
            foreach($xmlObject->c_soutput as $soutput)
            {
                $data[] =[
                    'thang' => $soutput->thang,
                    'kdjendok' => $soutput->kdjendok,
                    'kdsatker' => $soutput->kdsatker,
                    'kddept' => $soutput->kddept,
                    'kdunit' => $soutput->kdunit,
                    'kdprogram' => $soutput->kdprogram,
                    'kdgiat' => $soutput->kdgiat,
                    'kdoutput' => $soutput->kdoutput,
                    'kdlokasi' => $soutput->kdlokasi,
                    'kdkabkota' => $soutput->kdkabkota,
                    'kddekon' => $soutput->kddekon,
                    'kdsoutput' => $soutput->kdsoutput,
                    'ursoutput' => $soutput->ursoutput,
                    'sbmkvol' => $soutput->sbmkvol,
                    'sbmksat' => $soutput->sbmksat,
                    'sbmkmin1' => $soutput->sbmkmin1,
                    'kdsb' => $soutput->kdsb,
                    'volsout' => $soutput->volsout,
                    'volsbk' => $soutput->volsbk,
                    'kdib' => $soutput->kdib,
                ];
            }
            Dro::insert($data); // insert ke table
            DB::commit();
            return redirect()->route('ro.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
        } catch(\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
