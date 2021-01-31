<?php

namespace Modules\Pengguna\Http\Controllers;

use App\Models\User;
use Modules\Sdm\Entities\PegawaiData;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pengguna = User::paginate(10);
        return view('pengguna::user.index',compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $pengguna = User::select('nip');
        $pegawai = PegawaiData::where([
            ['nama', '!=', null],
            [function ($query) use ($request){
                if(($term = $request->term)) {
                    $query->orWhere('nama', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->whereNotIn('nip', $pengguna)
        ->whereIn('status_id', ['1'])->orderBy('satker_id', 'asc')
                                ->orderBy('jabatan_id', 'asc')
                                ->orderBy('tugas_id', 'desc')
                                ->orderBy('pangkat_id', 'desc')
                                ->paginate(20);
        return view('pengguna::user.create',compact('pegawai'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if($request->has('nip')) {
            $nip_pegawai = $request->get('nip');
            $data=array();
            foreach($nip_pegawai as $data_nip)
            {
                $email = PegawaiData::find($data_nip)->email;
                $data[] =[
                    'nip' => $data_nip,
                    'username' => explode('@',$email)[0],
                    'password' => Hash::make('qwerty123'),
                    'flag' => '1',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ];
            }
            $user = User::insert($data); // insert ke table user
            $users = User::whereIn('nip', array_column($data, 'nip'))->get(); // ambil semua data yg baru di insert
            foreach($users as $user) {
                $user->assignRole('pengguna'); // assign role ke user baru
            }
            return redirect()->route('user')->withSuccess('Data telah ditambahkan.');
        } else {
            return back()->withError('Harus ada data yang dipilih.');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($nip)
    {
        $pengguna = User::whereNip($nip)->first(); // select user
        $userrole = $pengguna->roles->pluck('name')->toArray(); //select all roles of the user
        $role = Role::whereNotIn('name', $userrole)->get(); // select roles where not yet assigned
        return view('pengguna::user.show', compact('pengguna', 'role'));
    }

    public function assignRole(Request $request)
    {
        $items = $request->get('role');
        foreach ($items as $item) {
            $pengguna = User::whereNip($request->nip)->first();
            $pengguna->assignRole($item);
        }
        $role = implode(', ', $items);
        return redirect()->back()->withSuccess('Role ' . $role . ' telah ditambahkan');
    }

    public function revokeRole(Request $request)
    {
        $items = $request->get('role');
        foreach ($items as $item) {
            $pengguna = User::whereNip($request->nip)->first();
            $pengguna->removeRole($item);
        }

        $role = implode(', ', $items);
        return redirect()->back()->withSuccess('Role ' . $role . ' telah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($nip)
    {
        if($nip == Auth::user()->nip){
            return redirect()->route('pengguna.index')
            ->with('error','Anda tidak bisa menghapus data sendiri');
        }
        $user = User::whereNip($nip)->first();
        $user->syncRoles([]); // hapus semua role yang dimiliki oleh user tsb
        $user->delete(); // hapus user
        return redirect()->route('user')
                ->with('success','Data telah di hapus');
    }

    public function updateStatus(Request $request)
    {
        if (! Gate::allows('edit-user-status')) {
            return abort(401, 'Anda tidak berhak mengubah status pengguna');
        }

        if($request->nip == Auth::user()->nip){
            return Redirect::route('user')
            ->withError('Anda tidak bisa mengatur status sendiri');
        }

        $user = User::findOrFail($request->nip);
        $user->flag = $request->flag;
        $user->save();
        return response()->json(['success' => 'User status updated successfully.']);
    }
}
