<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dskmpnen;

class SkmpnenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dskmpnen = Dskmpnen::orderBy('kdprogram', 'asc')
        ->orderBy('kdgiat','asc')
        ->orderBy('kdoutput','asc')
        ->orderBy('kdsoutput','asc')
        ->orderBy('kdkmpnen','asc')
        ->orderBy('kdskmpnen','asc')
        ->paginate(10);
        return view('anggaran::upload.skmpnen.index',compact('dskmpnen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::upload.skmpnen.upload');
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
            foreach($xmlObject->c_skmpnen as $skmpnen)
            {
                $data[] =[
                    'thang' => $skmpnen->thang,
                    'kdjendok' => $skmpnen->kdjendok,
                    'kdsatker' => $skmpnen->kdsatker,
                    'kddept' => $skmpnen->kddept,
                    'kdunit' => $skmpnen->kdunit,
                    'kdprogram' => $skmpnen->kdprogram,
                    'kdgiat' => $skmpnen->kdgiat,
                    'kdoutput' => $skmpnen->kdoutput,
                    'kdlokasi' => $skmpnen->kdlokasi,
                    'kdkabkota' => $skmpnen->kdkabkota,
                    'kddekon' => $skmpnen->kddekon,
                    'kdsoutput' => $skmpnen->kdsoutput,
                    'kdkmpnen' => $skmpnen->kdkmpnen,
                    'kdskmpnen' => $skmpnen->kdskmpnen,
                    'urskmpnen' => $skmpnen->urskmpnen,
                    'kdib' => $skmpnen->kdib,
                ];
            }
            Dskmpnen::insert($data); // insert ke table
            DB::commit();
            return redirect()->route('skmpnen.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
        } catch(\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
