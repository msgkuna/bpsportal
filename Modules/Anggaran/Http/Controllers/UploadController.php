<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Anggaran\Entities\Dakun;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dakun = Dakun::paginate(10);
        return view('anggaran::upload.akun.index',compact('dakun'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function fileUpload()
    {
        return view('anggaran::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('anggaran::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('anggaran::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
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
            foreach($xmlObject->c_akun as $akun)
            {
                $data[] =[
                    'thang' => $akun->thang,
                    'kdjendok' => $akun->kdjendok,
                    'kdsatker' => $akun->kdsatker,
                    'kddept' => $akun->kddept,
                    'kdunit' => $akun->kdunit,
                    'kdprogram' => $akun->kdprogram,
                    'kdgiat' => $akun->kdgiat,
                    'kdoutput' => $akun->kdoutput,
                    'kdlokasi' => $akun->kdlokasi,
                    'kdkabkota' => $akun->kdkabkota,
                    'kddekon' => $akun->kddekon,
                    'kdsoutput' => $akun->kdsoutput,
                    'kdkmpnen' => $akun->kdkmpnen,
                    'kdskmpnen' => $akun->kdskmpnen,
                    'kdakun' => $akun->kdakun,
                    'kdkppn' => $akun->kdkppn,
                    'kdbeban' => $akun->kdbeban,
                    'kdjnsban' => $akun->kdjnsban,
                    'kdctarik' => $akun->kdctarik,
                    'register' => $akun->register,
                    'carahitung' => $akun->carahitung,
                    'prosenphln' => $akun->prosenphln,
                    'prosenrmp' => $akun->prosenrmp,
                    'kppnrkp' => $akun->kppnrkp,
                    'kppnrmp' => $akun->kppnrmp,
                    'kppnphln' => $akun->kppnphln,
                    'regdam' => $akun->regdam,
                    'kdluncuran' => $akun->kdluncuran,
                    'kdblokir' => $akun->kdblokir,
                    'uraiblokir' => $akun->uraiblokir,
                    'kdib' => $akun->kdib,
                ];
            }
            Dakun::insert($data); // insert ke table
            DB::commit();
            return back()->withSuccess('Data '.$UploadfileName.' telah berhasil diupload ke database');
        } catch(\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

}
