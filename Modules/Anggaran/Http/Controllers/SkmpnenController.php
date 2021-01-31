<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dskmpnen;
use Illuminate\Support\Facades\Auth;

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
        ->paginate(20);
        return view('anggaran::data.skmpnen.index',compact('dskmpnen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::data.skmpnen.upload');
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

        if(!is_null($xmlObject->c_skmpnen[0])) {
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
                        'created_by' => Auth::user()->nip,
                        'updated_by' => Auth::user()->nip,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ];
                }
                Dskmpnen::truncate();
                Dskmpnen::insert($data); // insert ke table
                DB::commit();
                return redirect()->route('skmpnen.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
            } catch(\Throwable $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            return redirect()->route('skmpnen.index')->withError('Data pada file '.$UploadfileName.' tidak yang sesuai. Upload data ke database tidak berhasil');
        }
    }
}
