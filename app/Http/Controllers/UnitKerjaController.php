<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users =User::with('roles')->get();
        return view('UnitKerja.index', compact('users', 'roles'));
    }
    public function del(Request $x)
    {
        $user = User::where('id', $x->id)->first();
        $user->roles()->detach();
        $user->delete();
        return response()->json([$x->id]);
    }

    public function add(Request $x)
    {
        $req = [
            'username' => $x->username,
            'unit_kerja' => $x->unit_kerja,
            'password' => $x->password ?? bcrypt('password')
        ];
        $user = User::UpdateOrCreate(["id" => $x->id], $req);
        $user->syncRoles($x->role);
        return response()->json(['SUKSES']);
    }
}
