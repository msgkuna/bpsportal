<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dkmpnen;
use Illuminate\Support\Facades\Auth;

class KmpnenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dkmpnen = Dkmpnen::orderBy('kdprogram', 'asc')
        ->orderBy('kdgiat','asc')
        ->orderBy('kdoutput','asc')
        ->orderBy('kdsoutput','asc')
        ->orderBy('kdkmpnen','asc')
        ->paginate(10);
        return view('anggaran::upload.kmpnen.index',compact('dkmpnen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::upload.kmpnen.upload');
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
            foreach($xmlObject->c_kmpnen as $kmpnen)
            {
                $data[] =[
                    'thang' => $kmpnen->thang,
                    'kdjendok' => $kmpnen->kdjendok,
                    'kdsatker' => $kmpnen->kdsatker,
                    'kddept' => $kmpnen->kddept,
                    'kdunit' => $kmpnen->kdunit,
                    'kdprogram' => $kmpnen->kdprogram,
                    'kdgiat' => $kmpnen->kdgiat,
                    'kdoutput' => $kmpnen->kdoutput,
                    'kdlokasi' => $kmpnen->kdlokasi,
                    'kdkabkota' => $kmpnen->kdkabkota,
                    'kddekon' => $kmpnen->kddekon,
                    'kdsoutput' => $kmpnen->kdsoutput,
                    'kdkmpnen' => $kmpnen->kdkmpnen,
                    'kdbiaya' => $kmpnen->kdbiaya,
                    'kdsbiaya' => $kmpnen->kdsbiaya,
                    'urkmpnen' => $kmpnen->urkmpnen,
                    'kdtema' => $kmpnen->kdtema,
                    'rphpls1' => $kmpnen->rphpls1,
                    'rphpls2' => $kmpnen->rphpls2,
                    'rphpls3' => $kmpnen->rphpls3,
                    'rphmin1' => $kmpnen->rphmin1,
                    'thangawal' => $kmpnen->thangawal,
                    'thangakhir' => $kmpnen->thangakhir,
                    'indekskali' => $kmpnen->indekskali,
                    'kdib' => $kmpnen->kdib,
                    'indeksout' => $kmpnen->indeksout,
                    'n1' => $kmpnen->n1,
                    'n2' => $kmpnen->n2,
                    'n3' => $kmpnen->n3,
                    'n4' => $kmpnen->n4,
                    'rphn1' => $kmpnen->rphn1,
                    'rphn2' => $kmpnen->rphn2,
                    'rphn3' => $kmpnen->rphn3,
                    'rphn4' => $kmpnen->rphn4,
                    'created_by' => Auth::user()->nip,
                    'updated_by' => Auth::user()->nip,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ];
            }
            Dkmpnen::insert($data); // insert ke table
            DB::commit();
            return redirect()->route('kmpnen.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
        } catch(\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
