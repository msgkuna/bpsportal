<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dkro;
use Illuminate\Support\Facades\Auth;

class KroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dkro = Dkro::orderBy('kdprogram', 'asc')
            ->orderBy('kdgiat','asc')
            ->orderBy('kdoutput','asc')
            ->paginate(20);
        return view('anggaran::data.kro.index',compact('dkro'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::data.kro.upload');
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

        if(!is_null($xmlObject->c_output[0])) {
            DB::beginTransaction();
            try {
                $data=array();
                foreach($xmlObject->c_output as $output)
                {
                    $data[] =[
                        'thang' => $output->thang,
                        'kdjendok' => $output->kdjendok,
                        'kdsatker' => $output->kdsatker,
                        'kddept' => $output->kddept,
                        'kdunit' => $output->kdunit,
                        'kdprogram' => $output->kdprogram,
                        'kdgiat' => $output->kdgiat,
                        'kdoutput' => $output->kdoutput,
                        'kdlokasi' => $output->kdlokasi,
                        'kdkabkota' => $output->kdkabkota,
                        'kddekon' => $output->kddekon,
                        'volmin1' => $output->volmin1,
                        'vol' => $output->vol,
                        'volpls1' => $output->volpls1,
                        'volpls2' => $output->volpls2,
                        'volpls3' => $output->volpls3,
                        'volsbk' => $output->volsbk,
                        'rphmin1' => $output->rphmin1,
                        'rphpls1' => $output->rphpls1,
                        'rphpls2' => $output->rphpls2,
                        'rphpls3' => $output->rphpls3,
                        'sbkket' => $output->sbkket,
                        'sbkmin1' => $output->sbkmin1,
                        'kdsb' => $output->kdsb,
                        'kdjoutput' => $output->kdjoutput,
                        'thangawal' => $output->thangawal,
                        'thangakhir' => $output->thangakhir,
                        'kdtema' => $output->kdtema,
                        'kdib' => $output->kdib,
                        'kdauto' => $output->kdauto,
                        'kdmulti' => $output->kdmulti,
                        'created_by' => Auth::user()->nip,
                        'updated_by' => Auth::user()->nip,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ];
                }
                Dkro::truncate();
                Dkro::insert($data); // insert ke table
                DB::commit();
                return redirect()->route('kro.index')->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
            } catch(\Throwable $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            return redirect()->route('kro.index')->withError('Data pada file '.$UploadfileName.' tidak yang sesuai. Upload data ke database tidak berhasil');
        }
    }
}
