<?php

namespace App\Http\Controllers;

use App\Models\Ik;
use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class programController extends Controller
{
    public function index()
    {
        $Program = DB::SELECT( DB::RAW("SELECT tb_prog.*,tb_ik.indikator_kinerja FROM tb_prog INNER JOIN tb_ik ON tb_ik.kode_ik = tb_prog.kode_ik "));
        $IK = IK::get();
        return view('program.index',compact('Program','IK'));
    }
    public function del(Request $x)
    {
        program::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "id"=> rand(1000,9999),
            "kode_ik" => $x->kode_ik,
            "kode_prog" => $x->kode_prog,
            "program" => $x->program,
        ];
        program::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }
}
