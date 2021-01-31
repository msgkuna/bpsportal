<?php

namespace Modules\Pengguna\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\Pengguna\Entities\Role;
use Modules\Pengguna\Entities\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('pengguna::role.index', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:50',
            'description' => 'nullable|string'
        ]);

        $role = Role::firstOrCreate(['name' => $request->name, 'description' => $request->description]);
        return redirect()->back()->with('success', 'Role ' . $role->name . ' telah ditambahkan');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Role: ' . $role->name . ' telah dihapus']);
    }

    public function show($id)
    {
        $role = Role::findById($id); // select role
        $role_permission = $role->permissions()->get(); //get all permissions of role in array
        // dd($role_permission);
        // $role_permission = $role->permissions; //select all permissions of role
        $permission = Permission::whereNotIn('name', $role->permissions()->pluck('name')->toArray())->get(); // select all permissions where not yet assigned to role
        return view('pengguna::role.show', compact('permission', 'role', 'role_permission'));
    }

    public function assignPermission(Request $request)
    {
        $items = $request->get('permission');
        $role = Role::findByName($request->role);
        $role->givePermissionTo($request->permission);
        $permission = implode(', ', $items);
        return redirect()->back()->with('success', 'Permission ' . $permission . ' telah ditambahkan');
    }

    public function revokePermission(Request $request)
    {
        $items = $request->get('permission');
        $role = Role::findByName($request->role);
        foreach ($items as $item) {
            $role->revokePermissionTo($item);
        }
        $role = implode(', ', $items);
        return redirect()->back()->with('success', 'Role ' . $role . ' telah dihapus');
    }

}
