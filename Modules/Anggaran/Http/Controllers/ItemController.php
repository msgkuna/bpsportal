<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Ditem;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ditem = Ditem::orderBy('kdprogram', 'asc')
        ->orderBy('kdgiat','asc')
        ->orderBy('kdoutput','asc')
        ->orderBy('kdsoutput','asc')
        ->orderBy('kdkmpnen','asc')
        ->orderBy('kdskmpnen','asc')
        ->orderBy('kdakun','asc')
        ->orderBy('noitem','asc')
        ->paginate(10);
        return view('anggaran::upload.item.index',compact('ditem'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::upload.item.upload');
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
            foreach($xmlObject->c_item as $item)
            {
                $data[] =[
                    'thang' => $item->thang,
                    'kdjendok' => $item->kdjendok,
                    'kdsatker' => $item->kdsatker,
                    'kddept' => $item->kddept,
                    'kdunit' => $item->kdunit,
                    'kdprogram' => $item->kdprogram,
                    'kdgiat' => $item->kdgiat,
                    'kdoutput' => $item->kdoutput,
                    'kdlokasi' => $item->kdlokasi,
                    'kdkabkota' => $item->kdkabkota,
                    'kddekon' => $item->kddekon,
                    'kdsoutput' => $item->kdsoutput,
                    'kdkmpnen' => $item->kdkmpnen,
                    'kdskmpnen' => $item->kdskmpnen,
                    'kdakun' => $item->kdakun,
                    'kdkppn' => $item->kdkppn,
                    'kdbeban' => $item->kdbeban,
                    'kdjnsban' => $item->kdjnsban,
                    'kdctarik' => $item->kdctarik,
                    'register' => $item->register,
                    'carahitung' => $item->carahitung,
                    'header1' => $item->header1,
                    'header2' => $item->header2,
                    'kdheader' => $item->kdheader,
                    'noitem' => $item->noitem,
                    'nmitem' => $item->nmitem,
                    'vol1' => $item->vol1,
                    'sat1' => $item->sat1,
                    'vol2' => $item->vol2,
                    'sat2' => $item->sat2,
                    'vol3' => $item->vol3,
                    'sat3' => $item->sat3,
                    'vol4' => $item->vol4,
                    'sat4' => $item->sat4,
                    'volkeg' => $item->volkeg,
                    'satkeg' => $item->satkeg,
                    'hargasat' => $item->hargasat,
                    'jumlah' => $item->jumlah,
                    'jumlah2' => empty($item->jumlah2)?0:$item->jumlah2,
                    'paguphln' => $item->paguphln,
                    'pagurmp' => $item->pagurmp,
                    'pagurkp' => $item->pagurkp,
                    'kdblokir' => $item->kdblokir,
                    'blokirphln' => $item->blokirphln,
                    'blokirrmp' => $item->blokirrmp,
                    'blokirrkp' => $item->blokirrkp,
                    'rphblokir' => $item->rphblokir,
                    'kdcopy' => $item->kdcopy,
                    'kdabt' => $item->kdabt,
                    'kdsbu' => $item->kdsbu,
                    'volsbk' => $item->volsbk,
                    'volrkakl' => $item->volrkakl,
                    'blnkontrak' => $item->blnkontrak,
                    'nokontrak' => $item->nokontrak,
                    'tgkontrak' => (strtotime($item->tgkontrak)?$item->tgkontrak:null),
                    'nilkontrak' => $item->nilkontrak,
                    'januari' => $item->januari,
                    'pebruari' => $item->pebruari,
                    'maret' => $item->maret,
                    'april' => $item->april,
                    'mei' => $item->mei,
                    'juni' => $item->juni,
                    'juli' => $item->juli,
                    'agustus' => $item->agustus,
                    'september' => $item->september,
                    'oktober' => $item->oktober,
                    'nopember' => $item->nopember,
                    'desember' => $item->desember,
                    'jmltunda' => $item->jmltunda,
                    'kdluncuran' => $item->kdluncuran,
                    'jmlabt' => $item->jmlabt,
                    'norev' => $item->norev,
                    'kdubah' => $item->kdubah,
                    'kurs' => $item->kurs,
                    'indexkpjm' => $item->indexkpjm,
                    'kdib' => $item->kdib,
                    'created_by' => Auth::user()->nip,
                    'updated_by' => Auth::user()->nip,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ];
            }
            Ditem::insert($data); // insert ke table
            DB::commit();
            return redirect()->route('item.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
        } catch(\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
