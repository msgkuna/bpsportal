<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

// model
use Modules\Sdm\Entities\PegawaiData;
use Modules\Sdm\Entities\Agama;
use Modules\Sdm\Entities\Jabatan;
use Modules\Sdm\Entities\Tugas;
use Modules\Sdm\Entities\Kawin;
use Modules\Sdm\Entities\Pendidikan;
use Modules\Sdm\Entities\Satker;
use Modules\Sdm\Entities\Pangkat;
use Modules\Sdm\Entities\Status;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $pegawai = PegawaiData::where([
            ['nama', '!=', null],
            [function ($query) use ($request){
                if(($term = $request->term)) {
                    $query->orWhere('nama', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->whereIn('status_id', ['1', '2'])->orderBy('satker_id', 'asc')
        // ->whereIn('status_id', ['1','2'])->orderBy('satker_id', 'asc')
                                ->orderBy('jabatan_id', 'asc')
                                ->orderBy('tugas_id', 'desc')
                                ->orderBy('pangkat_id', 'desc')
                                ->paginate(20);
        return view('sdm::pegawai.index',compact('pegawai'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $agama = Agama::orderBy('agama_id', 'ASC')->get();
        $kawin = Kawin::orderBy('kawin_id', 'ASC')->get();
        $jabatan = Jabatan::orderBy('jabatan_id', 'ASC')->get();
        $didik = Pendidikan::orderBy('didik_id', 'ASC')->get();
        $satker = Satker::orderBy('satker_id', 'ASC')->get();
        $pangkat = Pangkat::orderBy('pangkat_id', 'ASC')->get();
        $status = Status::orderBy('status_id', 'ASC')->get();

        return view('sdm::pegawai.create',[
            'agama' => $agama,
            'didik' => $didik,
            'kawin' => $kawin,
            'jabatan' => $jabatan,
            'satker' => $satker,
            'pangkat' => $pangkat,
            'status' => $status
        ]);
    }

    public function get_by_tugas(Request $request)
    {
        if (!$request->jabatan_id) {
            $html = '<option value="">Penugasan</option>';
        } else {
            $html = '';
            $tugas = Tugas::where('jabatan_id', $request->jabatan_id)->get();
            foreach ($tugas as $row) {
                $html .= '<option value="'.$row->tugas_id.'">'.$row->uraian.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getTugas(Request $request)
    {
        $data['tugas_id'] = Tugas::where("jabatan_id",$request->jabatan_id)->get(["tugas_id","uraian"]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     * 'kawin_id', 'agama_id', 'pangkat_id', 'jabatan_id', 'didik_id', 'satker_id',
     * 'nipbaru', 'nik', 'nama', 'gelar_depan', 'gelar_belakang', 'tanggal_lahir',
     * 'jenis_kelamin', 'npwp', 'tmt_cpns', 'email', 'alamat', 'flag',
     * 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|numeric|digits:9|unique:pegawai_data',
            'nipbaru' => 'required|numeric|digits:18|unique:pegawai_data',
            'nik' => 'nullable|numeric|digits:16',
            'nama' => 'required|string|min:3|max:255',
            'gelar_depan' => 'nullable|string|max:30',
            'gelar_belakang' => 'nullable|string|max:30',
            'npwp' => 'nullable|numeric|digits:15',
            'email' => 'required|email|unique:pegawai_data|max:255',
            'kawin_id' => 'required|numeric|digits:1',
            'agama_id' => 'required|numeric|digits:1',
            'pangkat_id' => 'required|numeric|digits:2',
            'jabatan_id' => 'required|numeric|digits:1',
            'tugas_id' => 'required|numeric|digits:5',
            'didik_id' => 'required|numeric|digits:2',
            'satker_id' => 'required|numeric|digits:5',
            'status_id' => 'required|numeric|digits:1',
            'alamat' => 'nullable|string'
        ]);

        $tgl_lahir = substr($data['nipbaru'],6,2);
        $bln_lahir = substr($data['nipbaru'],4,2);
        $thn_lahir = substr($data['nipbaru'],0,4);

        $bln_tmt = substr($data['nipbaru'],12,2);
        $thn_tmt = substr($data['nipbaru'],8,4);
        // dd($data['nipbaru']);
        PegawaiData::create([
            'nip' => $data['nip'],
            'nipbaru' => $data['nipbaru'],
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'gelar_depan' => $data['gelar_depan'],
            'gelar_belakang' => $data['gelar_belakang'],
            'npwp' => $data['npwp'],
            'tanggal_lahir' => $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir,
            'jenis_kelamin' => substr($data['nipbaru'],14,1),
            'tmt_cpns' => $thn_tmt.'-'.$bln_tmt.'-01',
            'email' => $data['email'],
            'kawin_id' => $data['kawin_id'],
            'agama_id' => $data['agama_id'],
            'pangkat_id' => $data['pangkat_id'],
            'jabatan_id' => $data['jabatan_id'],
            'tugas_id' => $data['tugas_id'],
            'didik_id' => $data['didik_id'],
            'satker_id' => $data['satker_id'],
            'status_id' => $data['status_id'],
            'alamat' => $data['alamat'],
        ]);

        return redirect()->route('pegawai.index')
                        ->with('success','Data dengan nama '. $request->nama .' telah ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(PegawaiData $pegawai)
    {
        return view('sdm::pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(PegawaiData $pegawai)
    {
        $agama = Agama::orderBy('agama_id', 'ASC')->get();
        $kawin = Kawin::orderBy('kawin_id', 'ASC')->get();
        $jabatan = Jabatan::orderBy('jabatan_id', 'ASC')->get();
        $didik = Pendidikan::orderBy('didik_id', 'ASC')->get();
        $satker = Satker::orderBy('satker_id', 'ASC')->get();
        $pangkat = Pangkat::orderBy('pangkat_id', 'ASC')->get();
        $status = Status::orderBy('status_id', 'ASC')->get();
        $tugas = Tugas::where('jabatan_id', $pegawai->jabatan_id)->orderBy('jabatan_id', 'ASC')->orderBy('tugas_id', 'ASC')->get();

        return view('sdm::pegawai.edit',[
            'agama' => $agama,
            'didik' => $didik,
            'kawin' => $kawin,
            'jabatan' => $jabatan,
            'tugas' => $tugas,
            'satker' => $satker,
            'pangkat' => $pangkat,
            'pegawai' => $pegawai,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, PegawaiData $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'nik' => 'nullable|numeric|digits:16',
            'gelar_depan' => 'nullable|string|max:30',
            'gelar_belakang' => 'nullable|string|max:30',
            'npwp' => 'nullable|numeric|digits:15',
            'kawin_id' => 'required|numeric|digits:1',
            'agama_id' => 'required|numeric|digits:1',
            'pangkat_id' => 'required|numeric|digits:2',
            'jabatan_id' => 'required|numeric|digits:1',
            'tugas_id' => 'required|numeric|digits:5',
            'didik_id' => 'required|numeric|digits:2',
            'satker_id' => 'required|numeric|digits:5',
            'status_id' => 'required|numeric|digits:1',
            'alamat' => 'nullable|string'
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')
                        ->with('success','Data pegawai dengan nama '. $request->nama .' telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PegawaiData $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')
                        ->with('success','Data '. $pegawai->nama .' telah di hapus');
    }

}
