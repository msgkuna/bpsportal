<?php

namespace Modules\Pengguna\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\Pengguna\Entities\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $role = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('pengguna::permission.index', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:50',
            'description' => 'nullable|string'
        ]);

        $role = Permission::firstOrCreate(['name' => $request->name, 'description' => $request->description]);
        return redirect()->back()->with('success', 'Permission ' . $role->name . ' telah ditambahkan');
    }

    public function destroy($id)
    {
        $role = Permission::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Permission: ' . $role->name . ' telah dihapus']);
    }
}
